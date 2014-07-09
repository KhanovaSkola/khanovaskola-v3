<?php

namespace App\Presenters;

use App\InvalidArgumentException;
use App\Models\Rme;
use App\Models\Rme\User;
use App\Models\Structs\EventList;
use App\NotImplementedException;
use Nette\Security\Identity;


final class Token extends Presenter
{

	public function getHandler($type)
	{
		$map = [
			Rme\Token::TYPE_LOGIN => $this->onLogin,
			Rme\Token::TYPE_STUDENT_INVITE => $this->onStudentInvite,
		];
		if (!isset($map[$type]))
		{
			throw new NotImplementedException;
		}

		return $map[$type];
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

		$token->setUsed();
		$this->orm->tokens->flush();

		$handler = $this->getHandler($token->type);
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

}
