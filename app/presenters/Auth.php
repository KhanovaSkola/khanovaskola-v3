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
	 * @var Connection
	 * @inject
	 */
	public $queue;

	public function onLogin(User $user, $newUser = FALSE, $service = NULL)
	{
		$this->user->setExpiration('1 years', FALSE);

		$this->flashSuccess('auth.flash.login.' . ($newUser ? 'newUser' : 'returning'), [
			'name' => $user->firstName,
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
