<?php

namespace App;

use Mikulas\Diagnostics\ElasticSearchPanel;
use Nette;
use Nette\DI;
use Nette\DI\Container;
use Nette\FileNotFoundException;
use Nette\Loaders\RobotLoader;
use RuntimeException;


/**
 * app config, replaces bootstrap
 *
 * @method void onInit
 * @method void onAfter
 */
class Configurator extends Nette\Configurator
{

	/**
	 * Occurs before first Container is created
	 *
	 * @var array of function(Configurator $sender)
	 */
	public $onInit = [];

	/**
	 * Occurs after first Container is created
	 *
	 * @var array of function(Configurator $sender)
	 */
	public $onAfter = [];

	/**
	 * @param string|NULL null means autodetect
	 * @param array|NULL $params
	 */
	public function __construct($tempDirectory = NULL, array $params = NULL)
	{
		parent::__construct();

		if ($tempDirectory === NULL)
		{
			$tempDirectory = realpath(__DIR__ . '/../../temp');
		}
		$this->addParameters((array) $params + array_map('realpath', [
				'appDir' => __DIR__ . '/..',
				'backupDir' => __DIR__ . '/../../backups',
				'libsDir' => __DIR__ . '/../../vendor',
				'logDir' => __DIR__ . '/../../log',
				'wwwDir' => __DIR__ . '/../../www',
			]));
		$this->setTempDirectory($tempDirectory);

		foreach (get_class_methods($this) as $name)
		{
			if ($pos = strpos($name, 'onInit') === 0 && $name !== 'onInitPackages')
			{
				$this->onInit[lcfirst(substr($name, $pos + 5))] = [$this, $name];
			}
		}

		foreach (get_class_methods($this) as $name)
		{
			if ($pos = strpos($name, 'onAfter') === 0)
			{
				$this->onAfter[lcfirst(substr($name, $pos + 5))] = [$this, $name];
			}
		}
	}

	/**
	 * @param bool|array $value
	 * @throws \InvalidArgumentException
	 * @return self
	 */
	public function setDebugMode($value = FALSE)
	{
		if ($value === TRUE)
		{
			throw new \InvalidArgumentException('Use array of allowed ips instead');
		}
		return parent::setDebugMode($value);
	}


	public static function detectDebugMode($list = NULL)
	{
		if (strpos(php_uname('n'), 'testing-worker-') !== FALSE)
		{
			// Travis
			return TRUE;
		}

		return parent::detectDebugMode($list);
	}


	public function onInitConfigs()
	{
		$params = $this->getParameters();
		$this->addConfig($params['appDir'] . '/config/config.neon', FALSE);
		$this->addConfig($params['appDir'] . '/config/badges.neon', FALSE);
		$this->addConfig($params['appDir'] . '/config/config.local.neon', FALSE);
	}

	public function onAfterConfigVersion(Container $container)
	{
		$params = $this->getParameters();
		$example = Nette\Utils\Neon::decode(file_get_contents($params['appDir'] . '/config/config.local.example.neon'));
		if (!isset($container->parameters['configVersion']) || $container->parameters['configVersion'] !== $example['parameters']['configVersion'])
		{
			throw new ConfigFileNotUpToDateException;
		}
	}

	public function onAfterDebug(Container $container)
	{
		/** @var ElasticSearchPanel $panel */
		$panel = $container->getService('elasticPanel');
		Nette\Diagnostics\Debugger::getBar()->addPanel($panel);
	}

	/**
	 * @return RobotLoader
	 */
	public function createRobotLoader()
	{
		$params = $this->getParameters();
		$loader = parent::createRobotLoader();
		$loader->addDirectory($params['appDir']);
		$loader->addDirectory($params['libsDir'] . '/others');

		return $loader;
	}

	/**
	 * @return array
	 */
	public function getParameters()
	{
		return $this->parameters;
	}

	/**
	 * @throws MissingLocalConfigException
	 * @throws \Exception
	 * @throws \Nette\FileNotFoundException
	 * @return Container
	 */
	public function createContainer()
	{
		$this->onInit($this);
		$this->onInit = [];

		try
		{
			$container = parent::createContainer();
			$this->onAfter($container);

			return $container;
		}
		catch (FileNotFoundException $e)
		{
			if (strpos($e->getMessage(), 'local') !== FALSE)
			{
				throw new MissingLocalConfigException($e);
			}
			else
			{
				throw $e;
			}
		}
	}

}

class MissingLocalConfigException extends RuntimeException
{

	/**
	 * @param \Nette\FileNotFoundException $e
	 */
	public function __construct(FileNotFoundException $e)
	{
		parent::__construct("Local config files not found. Copy 'config.local.example.neon' to 'config.local.neon' and enter your local credentials.", NULL, $e);
	}

}

class ConfigFileNotUpToDateException extends RuntimeException
{
	public function __construct()
	{
		parent::__construct("Your 'config.local.neon' is not up to date. Check 'config.local.example.neon' to see what has changed, update your local config and then match 'configVersion'.");
	}
}
