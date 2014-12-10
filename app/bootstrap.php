<?php

umask(0);

$loader = require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/config/Configurator.php';
require __DIR__ . '/shortcuts.php';

$configurator = new App\Config\Configurator;
$configurator->setDebugMode(php_uname('n') === 'swit.hk.cvut.cz');
$configurator->enableDebugger(__DIR__ . '/../log', 'rullaf+errors@gmail.com');

$configurator->createRobotLoader()
	->register();

return $configurator->createContainer();
