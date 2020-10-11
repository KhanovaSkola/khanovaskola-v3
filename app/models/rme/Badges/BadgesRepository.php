<?php

namespace App\Models\Rme;

use App;
use App\Models\Orm\Repository;
use App\Models\Rme;


/**
 * @method Rme\Badge getByKey($key)
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
			return "App\\Models\\Rme\\Badges\\$data[key]";
		}

		throw new App\NotImplementedException;
	}

  public static function getTypes()
	{
		self::$types = [];
    self::$types[] = 'App\Models\Rme\Badges\VideoWatched';
		return self::$types;
	}
}
