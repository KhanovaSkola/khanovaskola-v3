<?php

namespace App\Models\Factories;

use Mikulas\Diagnostics\FlushingStreamHandler;
use Monolog\Logger;


class LogFactory
{

	const APP = 'app';
	const WORKER = 'worker';

	public static $name = self::APP;

	public static function create($logDir, $debugMode)
	{
		$file = "$logDir/application.log";
		$minLevel = $debugMode ? Logger::DEBUG : Logger::WARNING;
		$log = new Logger(self::$name);
		$log->pushHandler(new FlushingStreamHandler($file, $minLevel));
		return $log;
	}

}
