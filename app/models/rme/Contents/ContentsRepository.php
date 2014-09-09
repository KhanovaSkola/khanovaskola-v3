<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use Orm\DibiCollection;


/**
 * @method DibiCollection|Content[] findAll()
 */
class ContentsRepository extends Repository
{

	public static function getClasses()
	{
		return [
			'blueprint' => Blueprint::class,
			'video' => Video::class,
		];
	}

	public static function getTypes()
	{
		return array_keys(static::getClasses());
	}

	/**
	 * @param array $data
	 * @return array|string
	 */
	public function getEntityClassName(array $data = NULL)
	{
		$classes = static::getClasses();
		if ($data === NULL)
		{
			return array_values($classes);
		}

		return $classes[$data['type']];
	}

}
