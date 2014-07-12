<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Rme\User;
use App\Models\Structs\EventList;
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


final class Auth extends Presenter
{

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

	public function onLogin(User $user, $newUser = FALSE)
	{
		$this->user->setExpiration('5 years', FALSE);

		$this->flashSuccess('auth.flash.login.' . ($newUser ? 'newUser' : 'returning'), [
			'vocative' => $user->vocative,
		]);

		$this->trigger(EventList::LOGIN, [$user]);
		$this->orm->flush();

		$section = $this->session->getSection('auth');
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
	}

	/**
	 * @param NULL|string $email
	 */
	public function renderRegistration($email = NULL)
	{
		if ($this->user->loggedIn)
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
					return;
				}
				$me = $fb->api('/me');
				$this->registerOrLogin($me, function($id) {
					return $this->orm->users->getByFacebookId($id);
				}, function(User $user, $me) use ($fb) {
					$user->facebookId = $me->id;
					$user->facebookAccessToken = $fb->getAccessToken();
				});
			}
			catch (FacebookApiException $e)
			{
				$this->log->addAlert('Facebook login request failed', [
					'error' => $e->getMessage(),
				]);
				$this->flashError('auth.flash.fb.error');
			}

			$this->redirect('this');
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
			});
		}
		catch (Google_Exception $e)
		{
			$this->log->addAlert('Google login request failed', [
				'error' => $e->getMessage(),
			]);
			$this->flashError('auth.flash.google.error');
		}

		$this->redirect('this');
	}

	/**
	 * @param StdClass|ProfileInfo $me
	 * @param callable $findById
	 * @param callable $update
	 * @return User
	 */
	private function registerOrLogin($me, $findById, $update)
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
		$this->orm->flush();

		$this->user->login(new Identity($userEntity->id));

		$this->onLogin($userEntity, $newUser);
	}

	/**
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = new Nette\Application\UI\Form;
		$form->addText('email', 'Email:');
		$form->addPassword('password', 'Password:');

		$form->addSubmit('send', 'Sign in');

		// call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}


	public function signInFormSucceeded(Nette\Application\UI\Form $form)
	{
		$values = $form->getValues();
		$this->getUser()->setExpiration('14 days', FALSE);

		try {
			$this->getUser()->login($values->email, $values->password);
			$this->redirect('Homepage:');

		} catch (Nette\Security\AuthenticationException $e) {
			$this->flashError($e->getMessage());
		}
	}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashSuccess('auth.flash.logout');
		$this->redirect('in');
	}

}
