<?php

namespace App\Tasks;

use App\Models\Services\Mailer;
use Nette\DI\Container;


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

	public function run(Container $context)
	{
		/** @var Mailer $mailer */
		$mailer = $context->getService('mailer');

		return $mailer->send($this->view, $this->recipient, $this->args);
	}

}
