<?php

namespace App\Model;

use App;
use App\MustNeverHappenException;
use Nette\Utils\Neon;


/**
 * @mapper App\Model\Mapper
 *
 * @method App\Model\Badge getByKey()
 */
class BadgesRepository extends Repository
{

	static private $types;

	public function getEntityClassName(array $data = NULL)
	{
		if ($data === NULL)
		{
			return self::getTypes();
		}

		if (isset($data['key']))
		{
			return "App\\Model\\$data[key]Badge";
		}

		throw new MustNeverHappenException;
	}

	public static function getTypes()
	{
		if (!self::$types)
		{
			self::$types = [];
			$raw = file_get_contents(__DIR__ . '/../../../config/badges.neon');
			$config = Neon::decode($raw);
			foreach ($config['services'] as $node)
			{
				self::$types[] = $node['class'];
			}
		}

		return self::$types;
	}

}
