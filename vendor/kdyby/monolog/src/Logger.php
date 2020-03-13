<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Kdyby\Monolog;

class Logger extends \Monolog\Logger
{

	use \Kdyby\StrictObjects\Scream;

	/**
	 * @param string $channel
	 * @return \Kdyby\Monolog\CustomChannel
	 */
	public function channel($channel)
	{
		return new CustomChannel($channel, $this);
	}

}
