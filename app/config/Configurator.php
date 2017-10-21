<?php

namespace App\Config;

use App\Components\Controls\EditorSelector;
use App\Models\Orm\Entity;
use App\Models\Services\ElasticSearch;
use Bin\Support\VariadicArgvInput;
use DibiConnection;
use Mikulas\Tracy\QueryPanel\DibiQuery;
use Mikulas\Tracy\QueryPanel\ElasticSearchQuery;
use Nette;
use Nette\DI;
use Nette\DI\Container;
use Nette\FileNotFoundException;
use Nette\Loaders\RobotLoader;
use RuntimeException;
use Tracy\Debugger;
use Tracy\QueryPanel\QueryPanel;


/**
 * app config, replaces bootstrap
 *
 * @method void onInit()
 * @method void onAfter()
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
	 * @param NULL|string null means autodetect
	 * @param NULL|array $params
	 */
	public function __construct($tempDirectory = NULL, array $params = NULL)
	{
		parent::__construct();

		$root = __DIR__ . '/../..';

		$this->setTempDirectory(realpath("$root/temp"));

		$defaults = array_map('realpath', [
			'appDir' => "$root/app",
			'backupDir' => "$root/backups",
			'binDir' => "$root/bin",
			'libsDir' => "$root/vendor",
			'logDir' => "$root/log",
			'migrationsDir' => "$root/migrations",
			'testsDir' => "$root/tests",
			'wwwDir' => "$root/www",
		]);
		$defaults += [
			'testMode' => FALSE,
		];

		$this->addParameters((array) $params + $defaults);

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

	public function onInitDebug()
	{
		if (!$this->isDebugMode())
		{
			return;
		}

		Debugger::$maxDepth++;
		Debugger::$maxLen = 1e4;
	}

	public static function detectDebugMode($list = NULL)
	{
		if (isset($_SERVER['HTTP_X_BLACKFIRE_QUERY']))
		{
			// Blackfire
			return FALSE;
		}
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
		foreach ([
			'bin.neon',
			'config.neon',
			'config.local.neon'
		] as $file)
		{
			$this->addConfig($params['appDir'] . "/config/$file", FALSE);
		}
	}

	public function onAfterConsole($c)
	{
		/** @var Container $c */
		$s = 'console.router';
		if ($c->hasService($s))
		{
			$c->getService($s)->setInput(new VariadicArgvInput());
		}
	}

	public function onAfterFormExtensions()
	{
		EditorSelector::register();
	}

	public function onAfterEntityStaticCache(Container $container)
	{
		Entity::$metaDataStorage = $container->getService('cacheStorage');
	}

	/**
	 * @return RobotLoader
	 */
	public function createRobotLoader()
	{
		$params = $this->getParameters();
		$loader = parent::createRobotLoader();
		$loader->addDirectory($params['appDir']);
		$loader->addDirectory($params['binDir']);
		$loader->addDirectory($params['appDir'] . '/../migrations');
		$loader->addDirectory($params['appDir'] . '/../tests');
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

	/**
	 * Unlike parent implementation this one does not fail on nonatomic mkdir
	 * @return string
	 * @throws \Nette\InvalidStateException
	 */
	protected function getCacheDirectory()
	{
		if (empty($this->parameters['tempDir']))
		{
			throw new Nette\InvalidStateException('Set path to temporary directory using setTempDirectory().');
		}
		$dir = $this->parameters['tempDir'] . '/cache';
		// @codingStandardsIgnoreStart
		@mkdir($dir);
		// @codingStandardsIgnoreEnd
		return $dir;
	}

}

class MissingLocalConfigException extends RuntimeException
{

	/**
	 * @param \Nette\FileNotFoundException $e
	 */
	public function __construct(FileNotFoundException $e)
	{
		parent::__construct("Local config files not found. Copy 'stages/*.neon' to 'config.local.neon' and update your local credentials.", NULL, $e);
	}

}

class ConfigFileNotUpToDateException extends RuntimeException
{
	public function __construct()
	{
		parent::__construct("Your 'config.local.neon' is not up to date. Check 'config.local.example.neon' to see what has changed, update your local config and then match 'configVersion'.");
	}
}
