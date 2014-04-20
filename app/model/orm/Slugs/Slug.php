<?php

namespace App\Model;

use Nette\DateTime;


/**
 * @property string $slug
 * @property string $repository
 * @property int $entityId
 * @property DateTime $createdAt {default now}
 */
class Slug extends Entity
{

	public function getEntity()
	{

	}


}
