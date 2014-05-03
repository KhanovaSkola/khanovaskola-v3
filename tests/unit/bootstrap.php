<?php

$root = __DIR__ . '/../../';

require "$root/vendor/autoload.php";
require "$root/app/config/Configurator.php";

if (!class_exists('Tester\Assert'))
{
	echo "Install Nette Tester using `composer update --dev`\n";
	exit(1);
}

Tester\Environment::setup();

$configurator = new \App\Configurator("$root/tests/temp");

$configurator->onInit[] = function(\App\Configurator $c) {
	$c->addConfig(__DIR__ . '/config.neon');
};
$configurator->setDebugMode(FALSE);
$configurator->createRobotLoader()
	->register();

return $configurator->createContainer();
