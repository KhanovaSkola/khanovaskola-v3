<?php

namespace App\Model;

use App\MustNeverHappenException;


/**
 * @mapper App\Model\Mapper
 */
class BadgeUserBridgesRepository extends Repository
{

	private static $types;

	public function getEntityClassName(array $data = NULL)
	{
		if ($data === NULL)
		{
			return self::getTypes();
		}

		if (isset($data['key']))
		{
			/** @var RepositoryContainer $orm */
			$orm = $this->getModel();
			$badge = $orm->badges->getById($data['badge_id']);
			return "App\\Model\\{$badge->key}Badge";
		}

		throw new MustNeverHappenException;
	}

	public static function getTypes()
	{
		if (!self::$types)
		{
			self::$types = BadgesRepository::getTypes();
			array_walk(self::$types, function(&$type) {
				$type .= 'UserBridge';
			});
		}

		return self::$types;
	}

}
