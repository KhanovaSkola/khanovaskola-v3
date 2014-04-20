<?php

namespace App\Presenters;

use App\Model\User;
use Kdyby\Facebook\Dialog\LoginDialog;
use Kdyby\Facebook\Facebook;
use Kdyby\Facebook\FacebookApiException;
use Nette;
use Nette\Security\Identity;


final class AuthPresenter extends BasePresenter
{

	/** @var Facebook */
	protected $facebook;

	public function __construct(Facebook $facebook)
	{
		parent::__construct();
		$this->facebook = $facebook;
	}

	/**
	 * @return LoginDialog
	 */
	protected function createComponentFbLogin()
	{
		/** @var LoginDialog $dialog */
		$dialog = $this->facebook->createDialog('login');

		$dialog->onResponse[] = function (LoginDialog $dialog)
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
					$userEntity->name = $me->name;
					$userEntity->email = $me->email;
				}
				$userEntity->facebookId = $me->id;
				$userEntity->facebookAccessToken = $fb->getAccessToken();

				$this->orm->flush(); // persist $userEntity

				$this->user->login(new Identity($userEntity->id, [], $userEntity));

				$this->flashSuccess('auth.flash.login.' . ($newUser ? 'newUser' : 'returning'));
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
			$form->addError($e->getMessage());
		}
	}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashSuccess('auth.flash.logout');
		$this->redirect('in');
	}

}
