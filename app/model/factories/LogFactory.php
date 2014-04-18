<?php


namespace App\Factories;

use App\Configurator;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;


class LogFactory
{

	public static function create($logDir, $debugMode)
	{
		$file = "$logDir/application.log";
		$minLevel = $debugMode ? Logger::DEBUG : Logger::WARNING;
		$log = new Logger('app');
		$log->pushHandler(new StreamHandler($file, $minLevel));
		return $log;
	}

}
