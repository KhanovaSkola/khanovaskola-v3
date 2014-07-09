<?php

namespace App\Models\Services;

use App\Models\Rme\Token;
use App\Presenters;
use Latte\Engine;
use Monolog\Logger;
use Nette\Application\IPresenterFactory;
use Nette\Mail\Message;
use Nette\Mail\SmtpException;
use Nette\Mail\SmtpMailer;
use Nette\Object;
use Nette\Utils\Html;


class Mailer extends Object
{

	/** @var SmtpMailer */
	protected $mailer;

	/** @var Logger */
	private $logger;

	/** @var \Nette\Application\IPresenterFactory */
	private $factory;

	public function __construct($config, Logger $logger, IPresenterFactory $factory)
	{
		$this->mailer = new SmtpMailer($config);
		$this->logger = $logger;
		$this->factory = $factory;
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
		$msg->setFrom('Khanova škola <napiste-nam@khanovaskola.cz>');
		$msg->addReplyTo('Markéta Matějíčková <marketa@khanovaskola.cz>');
		$msg->addTo($recipient);

		$args['email'] = $msg;

		$latte = new Engine;

		/** @var Presenters\Token $presenter */
		$presenter = $this->factory->createPresenter('Token');
		$presenter->autoCanonicalize = FALSE;
		$latte->addFilter('token', function(Token $token, $unsafe) use ($presenter) {
			return $presenter->link('//Token:', ['token' => $token->toString($unsafe)]);
		});
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
