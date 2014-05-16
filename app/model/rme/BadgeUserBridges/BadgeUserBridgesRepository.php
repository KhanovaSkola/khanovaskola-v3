<?php

namespace App\Rme;

use App\MustNeverHappenException;
use App\Orm\Repository;


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
			return "App\\Rme\\BadgeUserBridges\\{$badge->key}";
		}

		throw new MustNeverHappenException;
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
