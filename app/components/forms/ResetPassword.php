<?php

namespace App\Components\Forms;

use App\InvalidStateException;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Tokens;
use App\Models\Structs\EntityPointer;
use App\Presenters\Auth;
use Kdyby\RabbitMq\Connection;


class ResetPassword extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	/**
	 * @var Connection
	 * @inject
	 */
	public $queue;

	public function setup()
	{
		$this->addText('email')
			->addRule($this::FILLED, 'email.missing')
			->addRule($this::EMAIL, 'email.wrong');

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
			$this->iLog('form.resetPassword.fail', ['email' => $v->email]);
			$this->presenter->flashError('/auth.reset.notFound');
			$this->addError('/auth.reset.notFound');
			return;
		}

		$token = Tokens\ResetPassword::createFromUser($userEntity);
		$this->orm->tokens->persist($token);
		$this->orm->flush(); // prevent race condition with queue

		$producer = $this->queue->getProducer('mail');
		$producer->publish(serialize([
			'template' => 'resetPassword',
			'recipient' => new EntityPointer($userEntity),
			'token' => new EntityPointer($token),
			'unsafe' => $token->getUnsafe(),
		]));

		$this->iLog('form.resetPassword.ok', ['email' => $v->email]);
		$presenter->flashSuccess('auth.reset.success');
		$presenter->redirect('this');
	}
}
