<?php

namespace App\Components\Forms;

use App\InvalidStateException;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Tokens;
use App\Models\Services\Queue;
use App\Models\Structs\EntityPointer;
use App\Models\Tasks\SendMailTask;
use App\Presenters\Auth;


class ResetPassword extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	/**
	 * @var Queue
	 * @inject
	 */
	public $queue;

	public function setup()
	{
		$this->addText('email')
			->addRule($this::FILLED)
			->addRule($this::EMAIL);

		$this->addSubmit();
	}

	protected function attached($presenter)
	{
		parent::attached($presenter);

		if (! $this->presenter instanceof Auth)
		{
			throw new InvalidStateException;
		}
	}

	public function onSuccess()
	{
		$v = $this->getValues();

		/** @var Auth $presenter */
		$presenter = $this->presenter;

		$userEntity = $this->orm->users->getByEmail($v->email);
		if (!$userEntity || !$userEntity->registered)
		{
			$this->addError('Email not found');
			return;
		}

		$token = Tokens\ResetPassword::createFromUser($userEntity);
		$this->orm->tokens->persist($token);
		$this->orm->flush(); // prevent race condition with queue

		$this->queue->enqueue(new SendMailTask('resetPassword', $userEntity, [
			'token' => new EntityPointer($token),
			'unsafe' => $token->getUnsafe(),
		]));

		$presenter->flashSuccess('auth.reset.success');
		$presenter->redirect('this');
	}
}
