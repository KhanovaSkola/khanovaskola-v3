<?php

namespace App\Config;

use App\Models\Services\ElasticSearch;
use App\Models\Services\Neo4j;
use Everyman\Neo4j\Command\GetServerInfo;
use Mikulas\Tracy\QueryPanel\DibiQuery;
use Mikulas\Tracy\QueryPanel\ElasticSearchQuery;
use Mikulas\Tracy\QueryPanel\Neo4jQuery;
use Nette;
use Nette\DI;
use Nette\DI\Container;
use Nette\FileNotFoundException;
use Nette\Loaders\RobotLoader;
use Nette\Neon\Neon;
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
				'binDir' => __DIR__ . '/../../bin',
				'libsDir' => __DIR__ . '/../../vendor',
				'logDir' => __DIR__ . '/../../log',
				'migrationsDir' => __DIR__ . '/../../migrations',
				'testsDir' => __DIR__ . '/../../tests',
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
		foreach ([
			'newrelic.neon',
			'badges.neon',
			'bin.neon',
			'deploy.neon',
			'config.neon',
			'config.local.neon'
		] as $file)
		{
			$this->addConfig($params['appDir'] . "/config/$file", FALSE);
		}
	}

	public function onAfterConfigVersion(Container $container)
	{
		$params = $this->getParameters();
		$example = Neon::decode(file_get_contents($params['appDir'] . '/config/config.local.example.neon'));
		if (!isset($container->parameters['configVersion']) || $container->parameters['configVersion'] !== $example['parameters']['configVersion'])
		{
			throw new ConfigFileNotUpToDateException;
		}
	}

	public function onAfterQueryPanel(Container $container)
	{
		if (!$this->isDebugMode())
		{
			return;
		}

		/** @var QueryPanel $panel */
		$panel = $container->getByType(QueryPanel::class);
		Debugger::getBar()->addPanel($panel);

		/** @var \DibiConnection $dibi */
		$dibi = $container->getService('dibiConnection');
		$dibi->onEvent[] = function(\DibiEvent $event) use ($panel) {
			$panel->addQuery(new DibiQuery($event));
		};

		/** @var Neo4j $neo4j */
		$neo4j = $container->getByType(Neo4j::class);
		$neo4j->onEvent[] = function($command, $result) use ($panel, $neo4j) {
			if (! $command instanceof GetServerInfo)
			{
				$panel->addQuery(new Neo4jQuery($command, $result, $neo4j->getTransport()));
			}
		};

		/** @var ElasticSearch $elastic */
		$elastic = $container->getByType(ElasticSearch::class);
		$request = NULL;
		$elastic->onEvent[] = function($message, $content) use ($panel, &$request) {
			if ($message === 'Request Body')
			{
				$request = $content[0];
				return;
			}
			if ($request && $message === 'Response')
			{
				$panel->addQuery(new ElasticSearchQuery($request, $content[0]));
				$request = NULL;
			}
		};
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
