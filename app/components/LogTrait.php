<?php

namespace App\Components;


trait LogTrait
{

	/**
	 * @var \Kdyby\Monolog\Logger
	 * @inject
	 */
	public $log;

	/**
	 * @param string $message
	 * @param array $data
	 */
	public function iLog($message, array $data = [])
	{
		/** @var Control $this */

		$data = array_merge([
			'user' => $this->presenter->user->id,
			'route' => $this->presenter->getName() . ':' . $this->presenter->action,
		], $data);

		$this->log->addInfo($message, $data);
	}

}
