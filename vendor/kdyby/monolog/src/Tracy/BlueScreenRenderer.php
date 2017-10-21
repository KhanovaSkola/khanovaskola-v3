<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Kdyby\Monolog\Tracy;

use Tracy\BlueScreen;
use Tracy\Logger;



class BlueScreenRenderer extends Logger
{

	public function __construct($directory, BlueScreen $blueScreen)
	{
		parent::__construct($directory, NULL, $blueScreen);
	}



	/**
	 * @param \Exception|\Throwable $exception
	 * @param string $file
	 * @return string logged error filename
	 */
	public function renderToFile($exception, $file)
	{
		return parent::logException($exception, $file);
	}



	/**
	 * @internal
	 * @deprecated
	 */
	public function log($message, $priority = self::INFO)
	{
		throw new \Kdyby\Monolog\NotSupportedException('This class is only for rendering exceptions');
	}



	/**
	 * @internal
	 * @deprecated
	 */
	public function defaultMailer($message, $email)
	{
		// pass
	}

}
