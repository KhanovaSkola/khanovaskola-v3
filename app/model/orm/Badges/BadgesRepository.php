<?php

namespace App\Model;

use App;
use App\MustNeverHappenException;


/**
 * @mapper App\Model\Mapper
 *
 * @method App\Model\Badge getByKey()
 */
class BadgesRepository extends Repository
{

	public function getEntityClassName(array $data = NULL)
	{
		if ($data === NULL)
		{
			return [
				'App\\Model\\VideoWatchedBadge',
			];
		}

		if (isset($data['key']))
		{
			return "App\\Model\\$data[key]Badge";
		}

		throw new MustNeverHappenException;
	}

}
