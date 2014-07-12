<?php

namespace App\Presenters;

use Exception;
use Nette;
use Tracy\Debugger;


final class Error extends Presenter
{

	/**
	 * @param Exception $exception
	 * @throws Nette\Application\AbortException
	 */
	public function renderDefault($exception)
	{
		if ($exception instanceof Nette\Application\BadRequestException)
		{
			$this->setView('4xx');

			$code = $exception->getCode();
			$this->template->code = $code;
			Debugger::log("HTTP code $code: {$exception->getMessage()} in {$exception->getFile()}:{$exception->getLine()}", 'access');
		}
		else
		{
			$this->setView('500'); // load template 500.latte
			Debugger::log($exception, Debugger::ERROR); // and log exception
		}

		if ($this->isAjax())
		{ // AJAX request? Note this error in payload.
			$this->payload->error = TRUE;
			$this->terminate();
		}
	}

}
