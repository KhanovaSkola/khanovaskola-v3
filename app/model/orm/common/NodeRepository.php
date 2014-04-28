<?php

namespace App\Model;

use Nette\Caching\Cache;
use Orm;
use Orm\Inflector;
use Orm\IRepositoryContainer;


abstract class NodeRepository extends Repository
{

	public function getEntityClassName(array $data = NULL)
	{
		$entities = [
			'redirect' => 'App\Model\RedirectEntity',
			'normal' => parent::getEntityClassName($data),
		];
		if (isset($data['redirectTo']))
		{
			return $entities['redirect'];
		}

		return $entities['normal'];
	}

}
