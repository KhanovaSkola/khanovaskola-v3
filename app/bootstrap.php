<?php

umask(0);

$loader = require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/config/Configurator.php';
require __DIR__ . '/shortcuts.php';

$configurator = new App\Config\Configurator;
$configurator->setDebugMode(true || ['147.32.98.51']);
$configurator->enableDebugger(__DIR__ . '/../log');

$configurator->createRobotLoader()
	->register();

return $configurator->createContainer();
