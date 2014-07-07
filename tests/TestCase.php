<?php

namespace Tests;

use Nette\DI\Container;
use Nette\Reflection\ClassType;
use Nette\Reflection\Method;
use Tester;


/**
 * Adds support for injected properties
 */
class TestCase extends Tester\TestCase
{

	/**
	 * @var \Nette\DI\Container
	 */
	protected $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	public function runTest($name, array $args = [])
	{
		$this->container->callInjects($this);
		$this->setUp();
		try {
			call_user_func_array([$this, $name], $args);
		} catch (\Exception $e) {
			// method does not exist
		}

		try
		{
			$this->tearDown();
		}
		catch (\Exception $tearDownEx)
		{
			throw isset($e) ? $e : $tearDownEx;
		}

		if (isset($e))
		{
			throw $e;
		}
	}

	public function getTests()
	{
		$tests = [];
		foreach (ClassType::from($this)->getMethods(Method::IS_PUBLIC) as $method)
		{
			$name = $method->getShortName();
			if (preg_match(static::METHOD_PATTERN, $name))
			{
				$tests[] = $name;
			}
		}
		return $tests;
	}

}
