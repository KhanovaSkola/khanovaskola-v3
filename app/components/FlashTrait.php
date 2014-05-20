<?php

namespace App\Components;

use App\DeprecatedException;
use Nette\Application\UI\Control as NControl;


trait FlashTrait
{

	public function flashError($key, $count = NULL, array $args = [])
	{
		$this->flash($key, $count, $args, 'danger');
	}

	public function flashInfo($key, $count = NULL, array $args = [])
	{
		$this->flash($key, $count, $args, 'info');
	}

	public function flashSuccess($key, $count = NULL, array $args = [])
	{
		$this->flash($key, $count, $args, 'success');
	}

	private function flash($key, $count = NULL, array $args = [], $type = NULL)
	{
		$id = 'flash';
		$messages = $this->getPresenter()->getFlashSession()->$id;
		$messages[] = $flash = (object) [
			'title' => $this->translator->translate("$key.title", $count, $args),
			'message' => $this->translator->translate("$key.message", $count, $args),
			'type' => $type,
		];
		$this->getTemplate()->flashes = $messages;
		$this->getPresenter()->getFlashSession()->$id = $messages;

		return $flash;
	}

	/**
	 * @deprecated
	 */
	final public function flashMessage($message, $type = NULL, $title = NULL)
	{
		throw new DeprecatedException('Use flashError, flashInfo or flashSuccess instead');
	}

}
