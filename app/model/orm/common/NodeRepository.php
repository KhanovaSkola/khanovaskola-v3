<?php

namespace App\Model;


use Orm;


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
