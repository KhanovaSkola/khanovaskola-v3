<?php

namespace App\Model;

use App\MustNeverHappenException;


/**
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

		if (isset($data['badge']))
		{
			/** @var RepositoryContainer $orm */
			$orm = $this->getModel();
			$badge = $orm->badges->getById($data['badge']);
			return "App\\Model\\{$badge->key}BadgeUserBridge";
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
