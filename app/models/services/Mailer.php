<?php

namespace App\Models\Services;

use App\InvalidStateException;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Token;
use App\Models\Rme\Tokens\Unsubscribe;
use App\Models\Rme\User;
use App\Presenters;
use Exception;
use Inflection;
use Latte\Engine;
use Monolog\Logger;
use Nette\Application\IPresenterFactory;
use Nette\Application\UI\Presenter;
use Nette\Mail\Message;
use Nette\Mail\SmtpException;
use Nette\Mail\SmtpMailer;
use Nette\Object;


class Mailer extends Object
{

	/**
	 * @var SmtpMailer
	 */
	protected $mailer;

	/**
	 * @var Logger
	 */
	private $logger;

	/**
	 * @var IPresenterFactory
	 */
	private $factory;

	/**
	 * @var RepositoryContainer
	 */
	private $orm;

	public function __construct($config, Logger $logger, IPresenterFactory $factory, RepositoryContainer $orm)
	{
		$this->mailer = new SmtpMailer($config);
		$this->logger = $logger;
		$this->factory = $factory;
		$this->orm = $orm;
	}

	private function getTemplate($view)
	{
		return __DIR__ . "/../../templates/emails/$view.latte";
	}

	/**
	 * @param string $view email template
	 * @param User $user
	 * @param NULL|array $args template variables
	 *
	 * @throws InvalidStateException if user unsubscribed
	 * @throws Exception from Latte\Engine
	 * @throws SmtpException from Mailer
	 */
	public function send($view, User $user, array $args = [])
	{
		if ($this->orm->unsubscribes->getByEmail($user->email))
		{
			// Last line of defense. Make sure unsubscribed users
			// really dont receive any email. This should however
			// be handled before the task is queued.
			throw new InvalidStateException;
		}

		$msg = new Message();
		$msg->setFrom('Khanova škola <reply@khanovaskola.cz>');
		$msg->addReplyTo('Markéta Matějíčková <marketa@khanovaskola.cz>');
		$msg->addTo($user->email, $user->name);

		$token = Unsubscribe::createFromUser($user);
		$token->emailType = $view;
		$this->orm->tokens->attach($token);
		$this->orm->flush();

		$args['recipient'] = $user;
		$args['email'] = $msg;
		$args['unsubscribe'] = (object) [
			'token' => $token,
			'code' => $token->getUnsafe(),
		];

		$latte = new Engine;

		/** @var Presenters\Token $presenter */
		$presenter = $this->factory->createPresenter('Token');
		$presenter->autoCanonicalize = FALSE;

		$ref = new \ReflectionProperty(Presenter::class, 'globalParams');
		$ref->setAccessible(TRUE);
		$ref->setValue($presenter, []);

		$latte->addFilter('token', function(Token $token, $unsafe) use ($presenter) {
			return $presenter->link('//Token:', ['token' => $token->toString($unsafe)]);
		});
		$latte->addFilter('vocative', function($phrase) {
			return Inflection::inflect($phrase, ['c' => 5]);
		});
		$template = $latte->renderToString($this->getTemplate($view), $args);
		$msg->setHtmlBody($template);

		$this->mailer->send($msg);
		$this->logger->addInfo('Email send', ['view' => $view, 'email' => $user->email]);
	}

}
