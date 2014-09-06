<?php

use Nette\DI\Container;
use Tests\TestCase;


/** @var Container $container */
$container = require __DIR__ . '/../../app/bootstrap.php';
return $container;


function file_get_php_classes($path)
{
	$code = file_get_contents($path);
	$classes = get_php_classes($code);
	return $classes;
}

function get_php_classes($code)
{
	$classes = [];
	$tokens = token_get_all($code);
	$count = count($tokens);
	$namespace = '';
	for ($i = 2; $i < $count; $i++)
	{
		if ($tokens[$i - 2][0] === T_NAMESPACE
			&& $tokens[$i - 1][0] == T_WHITESPACE
			&& $tokens[$i][0] == T_STRING)
		{
			do
			{
				$namespace .= $tokens[$i][1];
				$i++;
			}
			while ($tokens[$i] !== ';');
		}
		if ($tokens[$i - 2][0] == T_CLASS
			&& $tokens[$i - 1][0] == T_WHITESPACE
			&& $tokens[$i][0] == T_STRING)
		{
			$className = $tokens[$i][1];
			$classes[] = "$namespace\\$className";
		}
	}
	return $classes;
}

function runTests($path, Container $container)
{
	global $argv;
	$tests = $argv;
	array_shift($tests);

	foreach (file_get_php_classes($path) as $class)
	{
		if (!is_subclass_of($class, TestCase::class))
		{
			continue;
		}

		/** @var TestCase $test */
		$test = new $class($container);
		if (!$tests)
		{
			$test->run();
		}

		$first = TRUE;
		foreach ($test->getTests() as $method)
		{
			foreach ($tests as $name)
			{
				if (strpos(strToLower($method), strToLower($name)) !== FALSE)
				{
					if (!$first)
					{
						echo "\n";
					}
					echo "\033[01;33m$method\033[0m\n";
					$test->runTest($method);
					$first = FALSE;
				}
			}
		}
	}
}
