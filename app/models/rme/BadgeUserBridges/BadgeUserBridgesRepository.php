<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use App\Models\Orm\RepositoryContainer;
use App\NotImplementedException;


class BadgeUserBridgesRepository extends Repository
{

	private static $types;

	public function getEntityClassName(array $data = NULL)
	{
		if ($data === NULL)
		{
			return self::getTypes();
		}

		if (isset($data['badge']))
		{
			/** @var RepositoryContainer $orm */
			$orm = $this->getModel();
			/** @var Badge $badge */
			$badge = $orm->badges->getById($data['badge']);
			return "App\\Models\\Rme\\BadgeUserBridges\\{$badge->key}";
		}

		throw new NotImplementedException;
	}

	public static function getTypes()
	{
		if (!self::$types)
		{
			self::$types = BadgesRepository::getTypes();
			array_walk(self::$types, function(&$type) {
				$type = str_replace('\\Badges\\', '\\BadgeUserBridges\\', $type);
			});
		}

		return self::$types;
	}

}
