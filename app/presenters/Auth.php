<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Rme\User;
use App\Models\Services\UserMerger;
use App\Models\Structs\EventList;
use App\Models\Structs\LazyEntity;
use Google_Exception;
use Google_Service_Oauth2_Userinfoplus as ProfileInfo;
use Kdyby\Facebook\Dialog\LoginDialog as FacebookLoginDialog;
use Kdyby\Facebook\Facebook;
use Kdyby\Facebook\FacebookApiException;
use Kdyby\Google\Google;
use Nette;
use Nette\Forms\Controls\TextInput;
use Nette\Security\Identity;
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
	 * @var Facebook
	 */
	protected $facebook;

	/**
	 * @var Google
	 */
	protected $google;

	public function __construct(Facebook $facebook, Google $google)
	{
		parent::__construct();
		$this->facebook = $facebook;
		$this->google = $google;
	}

	public function onLogin(User $user, $newUser = FALSE, $service = NULL)
	{
		$this->user->setExpiration('5 years', FALSE);

		$this->flashSuccess('auth.flash.login.' . ($newUser ? 'newUser' : 'returning'), [
			'vocative' => $user->vocative,
		]);

		$this->trigger(EventList::LOGIN, [$user]);
		$this->orm->flush();

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
		$this->setCacheControlPublic();

		/** @var TextInput $input */
		$input = $this['loginForm-form-email'];
		$input->setDefaultValue($email);

		$this->template->email = $email;
	}

	public function renderResetPassword($email = NULL)
	{
		if ($this->user->isRegisteredUser())
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
			$this->redirect('resetPassword', ['email' => $this->userEntity->email]);
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
				$this->flashInfo('alreadyRegistered.loggedIn');
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
				$me = $fb->api('/me');
				$this->registerOrLogin($me, function($id) {
					return $this->orm->users->getByFacebookId($id);
				}, function(User $user, $me) use ($fb) {
					$user->facebookId = $me->id;
					$user->facebookAccessToken = $fb->getAccessToken();
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
				return $this->orm->users->getByFacebookId($id);
			}, function(User $user, $me) {
				$user->googleId = $me->id;
				$user->googleAccessToken = $this->google->getAccessToken()['access_token'];
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

			$userEntity->email = $me->email;
			$userEntity->gender = $me->gender;
			$userEntity->name = $me->name;
			$userEntity->familyName = $me instanceof ProfileInfo ? $me->familyName : $me->{'last_name'};
			$userEntity->setNominativeAndVocative($me instanceof ProfileInfo ? $me->givenName : $me->{'first_name'});
		}

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
		$vocative = NULL;
		if (!$user instanceof LazyEntity && $user->registered)
		{
			$vocative = $user->vocative;
		}

		$this->iLog('auth.logout');
		$this->getUser()->logout(TRUE);
		$this->template->add('vocative', $vocative);
	}

}
