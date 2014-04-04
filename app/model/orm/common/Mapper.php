<?php

namespace App\Model;

use Clevis\Skeleton\Orm\DibiMapper;


class Mapper extends DibiMapper
{

	public function findByIdOrdered(array $ids)
	{
		return $this->dataSource('
			SELECT *
			FROM (
				%sql', (string) $this->findAll(), '
			) [t]
			WHERE [id] IN %in
			ORDER BY FIELD([id], %i)
		', $ids, $ids);
	}

}
