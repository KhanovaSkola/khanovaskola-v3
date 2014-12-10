<?php

namespace App\Models\Services;

use App\Models\Orm\Entity;
use App\Models\Rme\Block;
use App\Models\Rme\Schema;
use App\Models\Rme\Subject;
use App\Models\Rme\User;


class Acl
{

	const ALL = 'all';

	/**
	 * @param User $user
	 * @param mixed|Entity $resource
	 * @param NULL|string $privilege
	 * @return bool
	 */
	public function isAllowed(User $user, $resource, $privilege = self::ALL)
	{
		if (in_array(self::ALL, $user->privileges))
		{
			return TRUE;
		}

		if ($resource instanceof Subject)
		{
			return $this->isAllowedBySubject($user, $resource);
		}
		else if ($resource instanceof Schema)
		{
			return $this->isAllowedBySchema($user, $resource)
				|| $this->isAllowedBySubject($user, $resource->subject);
		}
		else if ($resource instanceof Block)
		{
			$allowed = $this->isAllowedByBlock($user, $resource);
			if ($allowed)
			{
				return TRUE;
			}

			foreach ($resource->schemas as $schema)
			{
				if ($this->isAllowedBySchema($user, $schema)
					|| $this->isAllowedBySubject($user, $schema->subject))
				{
					return TRUE;
				}
			}
		}

		return FALSE;
	}

	/**
	 * @param User $user
	 * @param Subject $subject
	 * @return bool
	 */
	protected function isAllowedBySubject(User $user, Subject $subject)
	{
		return $this->isAllowedEditors($user, $subject);
	}

	/**
	 * @param User $user
	 * @param Schema $schema
	 * @return bool
	 */
	protected function isAllowedBySchema(User $user, Schema $schema)
	{
		return $this->isAllowedEditors($user, $schema);
	}

	/**
	 * @param User $user
	 * @param Block $block
	 * @return bool
	 */
	protected function isAllowedByBlock(User $user, Block $block)
	{
		return $this->isAllowedEditors($user, $block);
	}

	private function isAllowedEditors(User $user, $entity)
	{
		return $entity->editors->get()->findBy(['id' => $user->id])->count();
	}

}
