<?php

umask(0);

$loader = require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/config/Configurator.php';
require __DIR__ . '/shortcuts.php';

$configurator = new App\Config\Configurator;
$configurator->setDebugMode(['192.168.0.102']);
$configurator->enableDebugger(__DIR__ . '/../log');

$configurator->createRobotLoader()
	->register();

return $configurator->createContainer();
