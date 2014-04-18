<?php

$container = require __DIR__ . '/../bootstrap.php';

$p = $container->parameters['database'];

$config = [
	'paths' => [
		'migrations' => 'migrations',
	],
	'environments' => [
		'default_migration_table' => 'migrations',
		'default_database' => 'development',
		'development' => [
			'adapter' => $p['driver'] === 'mysqli' ? 'mysql' : $p['driver'],
			'host' => $p['host'],
			'user' => $p['username'],
			'pass' => $p['password'],
			'name' => $p['database'],
			'charset' => $p['charset'],
		]
	]
];

return $config;
