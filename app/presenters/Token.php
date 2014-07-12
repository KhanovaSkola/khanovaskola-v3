<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Rme\Tokens;
use App\Models\Rme\User;
use App\Models\Structs\EventList;
use App\NotImplementedException;
use Nette\Security\Identity;


final class Token extends Presenter
{

	public function getHandler(Rme\Token $token)
	{
		$map = [
			Tokens\LinkExistingStudent::class => $this->onStudentInvite,
			Tokens\LinkNewStudent::class => $this->onStudentInviteRegister,
			Tokens\Login::class => $this->onLogin,
			Tokens\Unsubscribe::class => $this->onUnsubscribe,
		];
		if (!isset($map[get_class($token)]))
		{
			throw new NotImplementedException;
		}
		return $map[get_class($token)];
	}

	public function actionDefault($token)
	{
		$token = Rme\Token::createFromString($token, $this->orm);

		try
		{
			$token->validate();
		}
		catch (Rme\TokenException $e)
		{
			$this->flashError('token.' . $e->getType());
			$this->redirect('Homepage:');
		}

		if (!$this->context->parameters['debugMode'])
		{
			$token->setUsed();
		}
		$this->orm->tokens->flush();

		$handler = $this->getHandler($token);
		$handler($token);
		$this->redirect('Homepage:'); // just a fallback
	}

	protected function login(User $user)
	{
		$this->user->login(new Identity($user->id));

		$this->trigger(EventList::LOGIN, [$user]);
		$this->orm->flush();
	}

	public function onLogin(Rme\Token $token)
	{
		$this->login($token->user);
		$this->flashSuccess('auth.flash.login.returning', [
			'vocative' => $token->user->vocative,
		]);
		$this->redirect('Profile:');
	}

	public function onStudentInvite(Rme\Token $token)
	{
		$this->login($token->user);

		$token->studentInvite->setAccepted();
		$this->orm->flush();
		$this->flashSuccess('student.approveMentor');

		$this->redirect('Profile:');
	}

	public function onStudentInviteRegister(Rme\Token $token)
	{
		$token->studentInvite->setAccepted();
		$this->orm->flush();

		$this->redirect('Auth:registration', ['email' => $token->user->email]);
	}

	public function onUnsubscribe(Rme\Token $token)
	{
		$us = new Rme\Unsubscribe($token->user->email, $token->emailType);
		$this->orm->unsubscribes->attach($us);
		$this->orm->flush();

		$this->flashSuccess('unsubscribe');
		$this->redirect('Homepage:');
	}

}
