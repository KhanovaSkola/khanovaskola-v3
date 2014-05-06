<?php

namespace App\Presenters;

use App\Model\EventList;
use App\Rme\User;
use Google_Exception;

use Kdyby\Facebook\Dialog\LoginDialog as FacebookLoginDialog;
use Kdyby\Facebook\Facebook;
use Kdyby\Facebook\FacebookApiException;
use Mikulas\Google\Dialog\LoginDialog as GoogleLoginDialog;
use Mikulas\Google\Google;
use Nette;
use Nette\Http\Session;
use Nette\Security\Identity;


final class AuthPresenter extends BasePresenter
{

	/** @var Facebook */
	protected $facebook;

	/** @var Google */
	protected $google;

	public function __construct(Facebook $facebook, Google $google)
	{
		parent::__construct();
		$this->facebook = $facebook;
		$this->google = $google;
	}

	private function onLogin(User $user, $newUser = FALSE)
	{
		$this->flashSuccess('auth.flash.login.' . ($newUser ? 'newUser' : 'returning'), [
			'vocative' => $user->vocative,
		]);

		$this->trigger(EventList::LOGIN, [$user]);

		/** @var Session $session */
		$session = $this->context->getService('session');
		$section = $session->getSection('auth');
		if ($key = $section->loginBacklink)
		{
			unset($section->loginBacklink);
			$this->restoreRequest($key);
		}
		$this->redirect('Profile:');
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

			if (!$fb->getUser())
			{
				$this->flashError('auth.flash.fb.denied');
				return;
			}

			$newUser = FALSE;
			try
			{
				$me = $fb->api('/me');
				$userEntity = $this->orm->users->getByFacebookId($me->id);
				if (!$userEntity)
				{
					$userEntity = $this->orm->users->getByEmail($me->email);
				}
				if (!$userEntity)
				{
					$newUser = TRUE;
					$userEntity = new User();
					$this->orm->users->attach($userEntity);

					$userEntity->email = $me['email'];
					$userEntity->gender = $me['gender'];
					$userEntity->name = $me['name'];
					$userEntity->familyName = $me['last_name'];
					$userEntity->setNominativeAndVocative($me['first_name']);
				}
				$userEntity->facebookId = $me['id'];
				$userEntity->facebookAccessToken = $fb->getAccessToken();

				$this->orm->flush(); // persist $userEntity

				$this->user->login(new Identity($userEntity->id));

				$this->onLogin($userEntity, $newUser);
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
		/** @var GoogleLoginDialog $dialog */
		$dialog = $this->google->createLoginDialog();
		$dialog->onResponse[] = function(GoogleLoginDialog $dialog)
		{
			$newUser = FALSE;
			try
			{
				$google = $dialog->getGoogle();
				$me = $google->getIdentity();
				$userEntity = $this->orm->users->getByGoogleId($me['sub']);
				if (!$userEntity)
				{
					$userEntity = $this->orm->users->getByEmail($me['email']);
				}
				if (!$userEntity)
				{
					$newUser = TRUE;
					$userEntity = new User();
					$this->orm->users->attach($userEntity);

					$userEntity->email = $me['email'];
					$userEntity->gender = $me['gender'];
					$userEntity->name = $me['name'];
					$userEntity->familyName = $me['family_name'];
					$userEntity->setNominativeAndVocative($me['given_name']);
				}
				$userEntity->googleId = $me['sub'];
				$userEntity->googleAccessToken = $google->getAccessToken();

				$this->orm->flush(); // persist $userEntity

				$this->user->login(new Identity($userEntity->id));

				$this->onLogin($userEntity, $newUser);
			}
			catch (Google_Exception $e)
			{
				$this->log->addAlert('Google login request failed', [
					'error' => $e->getMessage(),
				]);
				$this->flashError('auth.flash.google.error');
			}

			$this->redirect('this');
		};

		return $dialog;
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
