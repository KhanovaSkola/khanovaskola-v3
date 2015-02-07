<?php

namespace App\Models\Services\Consumers;

use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Mailer;


class Mail extends Consumer
{

	/**
	 * @var Mailer
	 */
	private $mailer;

	public function __construct(RepositoryContainer $orm, Mailer $mailer)
	{
		parent::__construct($orm);
		$this->mailer = $mailer;
	}

	public function invoke(array $args)
	{
		$view = array_shift($args);
		$recipient = array_shift($args);
		$this->mailer->send($view, $recipient, $args);
	}

}
