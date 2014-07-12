<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Rme\Tokens;
use App\Models\Rme\User;
use App\Models\Structs\EventList;
use Nette\Security\Identity;


final class Token extends Presenter
{

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

		$this->context->callMethod([$token, 'invoke'], [$this]);

		// just a fail-safe, tokens should call its own redirect
		$this->redirect('Homepage:');
	}

	public function login(User $user)
	{
		$this->user->login(new Identity($user->id));

		$this->trigger(EventList::LOGIN, [$user]);
		$this->orm->flush();
	}

}
