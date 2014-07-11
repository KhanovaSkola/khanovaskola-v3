<?php

namespace App\Models\Tasks;

use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Mailer;
use App\Models\Structs\EntityPointer;
use Nette\Mail\SmtpException;


class SendMailTask extends Task
{

	/** @var string */
	private $view;

	/** @var string */
	private $email;

	/** @var NULL|string */
	private $name;

	/** @var array|NULL template variables */
	private $args;

	public function __construct($view, $email, $name = NULL, array $args = [])
	{
		$this->view = $view;
		$this->email = $email;
		$this->name = $name;
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

		$mailer->send($this->view, $this->email, $this->name, $this->args);
	}

}
