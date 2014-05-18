<?php

namespace App\Services;

use Latte\Engine;
use Monolog\Logger;
use Nette\Mail\Message;
use Nette\Mail\SmtpException;
use Nette\Mail\SmtpMailer;
use Nette\Object;


class Mailer extends Object
{

	/** @var SmtpMailer */
	protected $mailer;

	/** @var Logger */
	private $logger;

	public function __construct($config, Logger $logger)
	{
		$this->mailer = new SmtpMailer($config);
		$this->logger = $logger;
	}

	private function getTemplate($view)
	{
		return __DIR__ . "/../../templates/emails/$view.latte";
	}

	/**
	 * @param string $view email template
	 * @param string $recipient email or "John Doe <john@example.com>"
	 * @param array|NULL $args template variables
	 * @return bool
	 */
	public function send($view, $recipient, array $args = [])
	{
		$msg = new Message();
		$msg->setFrom('Khanova škola <please-reply@khanovaskola.cz>');
		$msg->addTo($recipient);

		$latte = new Engine;
		$template = $latte->renderToString($this->getTemplate($view), $args);
		$msg->setHtmlBody($template);

		try
		{
			$this->mailer->send($msg);
			$this->logger->addInfo('Email send', [
				'view' => $view,
				'recipient' => $recipient,
				'args' => $args
			]);
			return TRUE;
		}
		catch (SmtpException $e)
		{
			$this->logger->addAlert('Mailing to smtp failed', [
				'error' => $e->getMessage(),
				'view' => $view,
				'recipient' => $recipient,
				'args' => $args
			]);
			return FALSE;
		}
	}

}
