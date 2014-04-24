<?php

$loader = require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/config/Configurator.php';

$configurator = new App\Configurator;

$configurator->setDebugMode(['127.0.0.1', '192.168.56.1']);
//$configurator->setDebugMode($configurator::PRODUCTION);
$configurator->enableDebugger(__DIR__ . '/../log', 'rullaf+errors@gmail.com');

$configurator->createRobotLoader()
	->register();

return $configurator->createContainer();
