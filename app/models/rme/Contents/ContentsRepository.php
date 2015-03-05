<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use App\Models\Structs\SearchResponse;
use Orm\DibiCollection;


/**
 * @method DibiCollection|Content[]   findAll()
 * @method DibiCollection|Content[]   findById($id)
 * @method DibiCollection|Video[]     findAllVideos()
 * @method DibiCollection|Video[]     findVideosWithoutDuration()
 * @method DibiCollection|Blueprint[] findAllBlueprints()
 * @method mixed                      findByFulltext($type, $query, $limit = 10, $offset = 0)
 * @method Content                    getRandom()
 * @method NULL|Video                 getVideoById(int $id)
 * @method NULL|Video                 getVideoByYoutubeId(string $youtubeId)
 * @method NULL|Blueprint             getBlueprintById(int $id)
 * @method SearchResponse             getWithFulltext(string $query, int $limit = 10, int $offset = 0)
 * @method NULL|array                 getNext(Content $content, Block $block = NULL, Schema $schema = NULL)
 *         returns (NULL|Content $content, NULL|Block $block, NULL|Schema $schema)
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
