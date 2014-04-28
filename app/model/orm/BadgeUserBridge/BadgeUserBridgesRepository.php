<?php

namespace App\Model;

use App\MustNeverHappenException;


/**
 * @mapper App\Model\Mapper
 */
class BadgeUserBridgesRepository extends Repository
{

	public function getEntityClassName(array $data = NULL)
	{
		if ($data === NULL)
		{
			return [
				'App\\Model\\VideoWatchedBadgeUserBridge',
			];
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


}
