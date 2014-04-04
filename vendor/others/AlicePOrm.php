<?php

namespace Nelmio\Alice\Loader;

use Nelmio\Alice\Loader\Base;
use Orm\RepositoryContainer;
use Symfony\Component\Yaml\Yaml as YamlParser;


class Porm extends Yaml
{

	const PERSIST_HACK = 'zzzzz';

	protected $orm;
	protected $map;

	public function setOrmMap(RepositoryContainer $orm, array $map)
	{
		$this->orm = $orm;
		$this->map = $map;
	}

	public function load($file)
	{
		ob_start();
		$loader = $this;

		// isolates the file from current context variables and gives
		// it access to the $loader object to inline php blocks if needed
		$includeWrapper = function () use ($file, $loader) {
			return include $file;
		};
		$data = $includeWrapper();

		if (1 === $data) {
			// include didn't return data but included correctly, parse it as yaml
			$yaml = ob_get_clean();
			$data = YamlParser::parse($yaml);
		} else {
			// make sure to clean up if theres a failure
			ob_end_clean();
		}

		if (!is_array($data)) {
			throw new \UnexpectedValueException('Yaml files must parse to an array of data');
		}

		foreach ($data as $class => &$nodes)
		{
			foreach ($nodes as &$node)
			{
				$node['__set'] = '__setter';

				// entity must be persisted before it can be attached to other entities
				$repo = $this->map[$class];
				$node[self::PERSIST_HACK] = $this->orm->$repo;
			}
		}

		return Base::load($data);
	}

}
