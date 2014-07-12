<?php

namespace App\Models\Tasks;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\User;
use App\Models\Services\Mailer;
use App\Models\Structs\EntityPointer;
use Nette\Mail\SmtpException;


class SendMailTask extends Task
{

	/**
	 * @var string
	 */
	private $view;

	/**
	 * @var EntityPointer to User
	 */
	private $pUser;

	/**
	 * @var NULL|array template variables
	 */
	private $args;

	public function __construct($view, User $user, array $args = [])
	{
		$this->view = $view;
		$this->pUser = new EntityPointer($user);
		$this->args = $args;
	}

	/**
	 * @param Mailer $mailer
	 * @param RepositoryContainer $orm
	 *
	 * @throws SmtpException
	 */
	public function run(Mailer $mailer, RepositoryContainer $orm)
	{
		foreach ($this->args as $i => $arg)
		{
			if ($arg instanceof EntityPointer)
			{
				$this->args[$i] = $arg->resolve($orm);
			}
		}
		/** @var User $user */
		$user = $this->pUser->resolve($orm);

		$mailer->send($this->view, $user, $this->args);
	}

}
