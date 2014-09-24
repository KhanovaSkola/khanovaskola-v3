<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use App\Models\Structs\Highlights\Collection;
use Orm\DibiCollection;


/**
 * @method DibiCollection|Content[] findAll()
 * @method Collection getWithFulltext()
 * @method NULL|Video getVideoById(int $id)
 * @method NULL|Blueprint getBlueprintById(int $id)
 * @method array getNextContent()
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
