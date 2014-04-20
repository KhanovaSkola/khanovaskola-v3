<?php

namespace App\Services;

use Nette\Latte\Engine;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;
use Nette\Object;
use Nette\Templating\FileTemplate;


class Mailer extends Object
{

	/** @var SmtpMailer */
	protected $mailer;

	public function __construct($config)
	{
		$this->mailer = new SmtpMailer($config);
	}

	private function getTemplate($view)
	{
		return __DIR__ . "/../../templates/emails/$view.latte";
	}

	/**
	 * @param string $view email template
	 * @param string $recipient email or "John Doe <john@example.com>"
	 * @param array|NULL $args template variables
	 */
	public function send($view, $recipient, array $args = [])
	{
		$msg = new Message();
		$msg->setFrom('Khanova škola <please-reply@khanovaskola.cz>');
		$msg->addTo($recipient);

		$template = new FileTemplate($this->getTemplate($view));
		$template->registerFilter(new Engine);
		foreach ($args as $key => $val)
		{
			$template->$key = $val;
		}

		$msg->setHtmlBody($template);
		// TODO add this to queue

		$this->mailer->send($msg);
	}

}
