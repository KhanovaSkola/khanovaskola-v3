<?php

namespace NextrasTests\TracyQueryPanel;

use Tester\Environment;


if (@!include __DIR__ . '/../vendor/autoload.php') {
	echo "Install Nette Tester using `composer update`\n";
	exit(1);
}

require_once __DIR__ . '/inc/TestCase.php';
require_once __DIR__ . '/inc/mocks/NDBConnectionMock.php';


define('TEMP_DIR', __DIR__ . '/temp');
date_default_timezone_set('Europe/Prague');

Environment::setup();


if (getenv(Environment::RUNNER)) {
	# Runner
	header('Content-type: text/plain');
	putenv('ANSICON=TRUE');

} elseif (PHP_SAPI === 'cli') {
	# CLI

} else {
	# Browser
}
