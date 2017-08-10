<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Rme\User;
use App\Models\Services\Acl;
use App\Models\Services\Aes;
use App\Models\Services\Queue;
use App\Models\Services\Sso;
use App\Models\Services\SsoContainer;
use App\Models\Services\UserMerger;
use App\Models\Structs\EntityPointer;
use App\Models\Structs\EventList;
use App\Models\Structs\LazyEntity;
use App\Models\Tasks;
use Google_Exception;
use Google_Service_Oauth2_Userinfoplus as ProfileInfo;
use Kdyby\Facebook\Dialog\LoginDialog as FacebookLoginDialog;
use Kdyby\Facebook\FacebookApiException;
use Kdyby\Google\Google;
use Kdyby\RabbitMq\Connection;
use Nette;
use Nette\Forms\Controls\TextInput;
use Nette\Security\Identity;
use Nette\Utils\Strings;
use stdClass;


/**
 * Login form links are hardcoded because login uses handles
 */
final class Auth extends Presenter
{

	/**
	 * @var UserMerger
	 * @inject
	 */
	public $userMerger;

	/**
	 * @var Aes
	 * @inject
	 */
	public $aes;

	/**
	 * @var SsoContainer
	 * @inject
	 */
	public $ssos;

	/**
	 * @var Google
	 * @inject
	 */
	public $google;

	/**
	 * @var Connection
	 * @inject
	 */
	public $queue;

	public function onLogin(User $user, $newUser = FALSE, $service = NULL)
	{
		$this->user->setExpiration('5 years', FALSE);

		$this->flashSuccess('auth.flash.login.' . ($newUser ? 'newUser' : 'returning'), [
			'name' => $user->firstName,
		]);

		$this->trigger(EventList::LOGIN, [$user]);
		$this->orm->flush();

		if (!$this->userEntity->avatar)
		{
			$producer = $this->queue->getProducer('updateAvatar');
			$producer->publish(serialize([
				'user' => new EntityPointer($this->userEntity),
			]));
		}

		$this->iLog("auth.login.$service");

		$section = $this->session->getSection('auth');
		$section->lastUser = [
			'email' => $user->email,
			'avatar' => $user->avatar,
		];
		if ($key = $section->loginBacklink)
		{
			unset($section->loginBacklink);
			$this->restoreRequest($key);
		}
		$this->redirect('Profile:');
	}

	/**
	 * @param NULL|string $email
	 */
	public function renderIn($email = NULL)
	{
		/** @var TextInput $input */
		$input = $this['loginForm-form-email'];
		$input->setDefaultValue($email);

		$this->template->email = $email;
	}

	public function renderResetPassword($email = NULL, $auth = FALSE)
	{
		if (!$auth && $this->user->isRegisteredUser())
		{
			$this->redirect('changePassword');
		}

		/** @var TextInput $input */
		$input = $this['resetPasswordForm-form-email'];
		$input->setDefaultValue($email);
	}

	public function actionChangePassword()
	{
		if (!$this->user->isRegisteredUser())
		{
			$this->redirectToAuthOrRegister();
		}

		$session = $this->session->getSection('auth');
		if (!$session->twoStepVerification)
		{
			$this->redirect('resetPassword', [
				'email' => $this->userEntity->email,
				'auth' => TRUE,
			]);
		}
	}

	/**
	 * @param NULL|string $email
	 */
	public function renderRegistration($email = NULL)
	{
		if ($this->user->isRegisteredUser())
		{
			if ($email && $this->userEntity->email !== $email)
			{
				$this->user->logout(TRUE);
			}
			else
			{
				$this->flashInfo('auth.flash.alreadyRegistered');
				$this->redirect('Profile:');
			}
		}

		$user = $this->orm->users->getByEmail($email);
		if ($user && $user->registered)
		{
			$this->flashInfo('alreadyRegistered.loggedOut');
			$this->redirect('Auth:in', ['email' => $email]);
		}

		/** @var TextInput $input */
		$input = $this['registrationForm-form-email'];
		$input->setDefaultValue($email);
	}

	/**
	 * @return FacebookLoginDialog
	 */
	protected function createComponentFacebookLogin()
	{
		/** @var FacebookLoginDialog $dialog */
		$dialog = $this->facebook->createDialog('login');

		$dialog->onResponse[] = function (FacebookLoginDialog $dialog)
		{
			$fb = $dialog->getFacebook();
			try
			{
				if (!$fb->getUser())
				{
					$this->flashError('auth.flash.fb.denied');
					$this->redirect('Auth:in');
				}
				$me = $fb->api('/me?fields=id,name,first_name,last_name,picture,email');
				$this->registerOrLogin($me, function($id) {
					return $this->orm->users->getByFacebookId($id);
				}, function(User $user, $me) use ($fb) {
					$user->facebookId = $me->id;
					$user->facebookAccessToken = $this->aes->encrypt($fb->getAccessToken());
				}, 'facebook');
			}
			catch (FacebookApiException $e)
			{
				$this->log->addAlert('Facebook login request failed', [
					'error' => $e->getMessage(),
				]);
				$this->flashError('auth.flash.fb.error');
			}

			$this->redirect('Auth:in');
		};

		return $dialog;
	}

	protected function createComponentGoogleLogin()
	{
		return $this->google->createLoginDialog();
	}

	public function actionGoogleResponse()
	{
		try
		{
			$me = $this->google->getProfile();
			$this->registerOrLogin($me, function($id) {
				return $this->orm->users->getByGoogleId($id);
			}, function(User $user, $me) {
				$user->googleId = $me->id;
				$token = $this->google->getAccessToken()['access_token'];
				$user->googleAccessToken = $this->aes->encrypt($token);
			}, 'google');
		}
		catch (Google_Exception $e)
		{
			$this->log->addAlert('Google login request failed', [
				'error' => $e->getMessage(),
			]);
			$this->flashError('auth.flash.google.error');
		}

		$this->redirect('Auth:in');
	}

	/**
	 * @param StdClass|ProfileInfo $me
	 * @param callable $findById
	 * @param callable $update
	 * @param NULL|string $service for logging
	 * @return User
	 */
	private function registerOrLogin($me, $findById, $update, $service = NULL)
	{
		/** @var User $userEntity */
		$userEntity = $findById($me->id);

		$newUser = FALSE;
		if (!$userEntity)
		{
			$userEntity = $this->orm->users->getByEmail($me->email);
		}
		if (!$userEntity)
		{
			$newUser = TRUE;
			$userEntity = new User();
			$this->orm->users->attach($userEntity);

			$userEntity->email = Strings::lower($me->email);
		}

		$isGoogle = $me instanceof ProfileInfo;
		$firstName = $isGoogle ? $me->givenName : $me->{'first_name'};

		$userEntity->gender = $me->gender ?: $this->orm->users->getGender($firstName);
		$userEntity->name = $me->name;
		$userEntity->familyName = $isGoogle ? $me->familyName : $me->{'last_name'};
		$userEntity->firstName = $firstName;
		$userEntity->avatar = $isGoogle
			? "$me->picture?sz=100"
			: "https://graph.facebook.com/{$me->id}/picture/?type=square&height=50&width=50"; // intentionally 50, fb returns 2x

		$update($userEntity, $me);

		$guest = NULL;
		if ($this->user->getId() && !$this->userEntity->registered)
		{
			$guest = $this->userEntity;
		}

		$this->orm->flush();
		$this->user->login(new Identity($userEntity->id));

		if ($newUser)
		{
			$this->iLog("auth.registration.$service");
		}

		if ($guest)
		{
			$this->userMerger->mergeUserInto($guest, $userEntity);
		}

		$this->orm->flush();
		$this->onLogin($userEntity, $newUser, $service);
	}

	public function actionOut()
	{
		$user = $this->getUserEntity();
		$name = NULL;
		if (!$user instanceof LazyEntity && $user->registered)
		{
			$name = $user->firstName;
		}

		$this->iLog('auth.logout');
		$this->getUser()->logout(TRUE);

		$this->template->name = $name;
	}

	protected function processSso(Sso $sso, $data, $sig)
	{
		if ($this->user->getUserEntity() instanceof LazyEntity)
		{
			$this->redirectToRegistration();
		}

		if ($sso->getSignature($data) !== $sig)
		{
			$this->error();
		}

		if (!$this->user->loggedIn)
		{
			$this->redirectToAuth();
		}

		$user = $this->user->getUserEntity();

		$sso->onLogin($user);
		$this->orm->flush();

		$url = $sso->getLoginUrl($data, $user);
		$this->redirectUrl($url);
	}

	public function actionDiscourseSso($sso, $sig)
	{
		$this->processSso($this->ssos->getSso('discourse'), $sso, $sig);
	}

	public function actionReportSso($sso, $sig)
	{
		$user = $this->user->getUserEntity();
		if (!$this->user->loggedIn)
		{
			$this->flashError('auth.flash.report.loggedOut');
			$this->redirectToAuthOrRegister();
		}
		else if ($user instanceof LazyEntity || !$this->user->isAllowed(Acl::LOGIN_REPORT))
		{
			$this->flashError('auth.flash.report.notAllowed');
			$this->redirectToAuthOrRegister();
		}

		$this->processSso($this->ssos->getSso('report'), $sso, $sig);
	}

}
