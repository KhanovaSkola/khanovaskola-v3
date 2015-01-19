<?php

umask(0);

if (file_exists('/srv/apps/majka/Inflect.php'))
{
	// production inflection-ext fix
	require '/srv/apps/majka/Inflect.php';
}

$loader = require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/config/Configurator.php';
require __DIR__ . '/shortcuts.php';

$configurator = new App\Config\Configurator;
$configurator->setDebugMode(FALSE&&php_uname('n') === 'swit.hk.cvut.cz');
$configurator->enableDebugger(__DIR__ . '/../log', 'rullaf+errors@gmail.com');

$configurator->createRobotLoader()
	->register();

return $configurator->createContainer();
