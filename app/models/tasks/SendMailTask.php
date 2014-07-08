<?php

namespace App\Models\Tasks;

use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Mailer;
use App\Models\Structs\EntityPointer;


class SendMailTask extends Task
{

	/** @var string */
	private $view;

	/** @var string email or "John Doe <john@example.com>" */
	private $recipient;

	/** @var array|NULL template variables */
	private $args;

	public function __construct($view, $recipient, array $args = [])
	{
		$this->view = $view;
		$this->recipient = $recipient;
		$this->args = $args;
	}

	public function run(Mailer $mailer, RepositoryContainer $orm)
	{
		foreach ($this->args as $i => $arg)
		{
			if ($arg instanceof EntityPointer)
			{
				$this->args[$i] = $arg->resolve($orm);
			}
		}

		return $mailer->send($this->view, $this->recipient, $this->args);
	}

}
