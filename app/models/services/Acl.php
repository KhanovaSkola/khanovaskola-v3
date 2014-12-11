<?php

namespace App\Models\Services;

use App\Models\Orm\Entity;
use App\Models\Rme\Block;
use App\Models\Rme\Schema;
use App\Models\Rme\Subject;
use App\Models\Rme\User;
use App\Models\Structs\AclApproval;


class Acl
{

	const ALL = 'all';

	/**
	 * @param User $user
	 * @param mixed|Entity $resource
	 * @param NULL|string $privilege
	 * @return FALSE|AclApproval
	 */
	public function isAllowed(User $user, $resource, $privilege = self::ALL)
	{
		if (in_array(self::ALL, $user->privileges))
		{
			return new AclApproval(AclApproval::PRIVILEGE);
		}

		if ($resource instanceof Subject)
		{
			return $this->isAllowedBySubject($user, $resource);
		}
		else if ($resource instanceof Schema)
		{
			if ($r = $this->isAllowedBySchema($user, $resource))
			{
				return $r;
			}
			else if ($r = $this->isAllowedBySubject($user, $resource->subject))
			{
				return $r;
			}
		}
		else if ($resource instanceof Block)
		{
			if ($r = $this->isAllowedByBlock($user, $resource))
			{
				return $r;
			}

			foreach ($resource->schemas as $schema)
			{
				if ($r = $this->isAllowedBySchema($user, $schema))
				{
					return $r;
				}
				else if ($this->isAllowedBySubject($user, $schema->subject))
				{
					return $r;
				}
			}
		}

		return FALSE;
	}

	/**
	 * @param User $user
	 * @param Subject $subject
	 * @return bool|int reason
	 */
	protected function isAllowedBySubject(User $user, Subject $subject)
	{
		if ($this->isAllowedEditors($user, $subject))
		{
			return new AclApproval(AclApproval::EDITOR, $subject);
		}
		return FALSE;
	}

	/**
	 * @param User $user
	 * @param Schema $schema
	 * @return bool|int reason
	 */
	protected function isAllowedBySchema(User $user, Schema $schema)
	{
		if ($schema->author === $user)
		{
			return new AclApproval(AclApproval::AUTHOR, $schema);
		}
		else if ($this->isAllowedEditors($user, $schema))
		{
			return new AclApproval(AclApproval::EDITOR, $schema);
		}
		return FALSE;
	}

	/**
	 * @param User $user
	 * @param Block $block
	 * @return bool|int reason
	 */
	protected function isAllowedByBlock(User $user, Block $block)
	{
		if ($block->author === $user)
		{
			return new AclApproval(AclApproval::AUTHOR, $block);
		}
		else if ($this->isAllowedEditors($user, $block))
		{
			return new AclApproval(AclApproval::EDITOR, $block);
		}
		return FALSE;
	}

	private function isAllowedEditors(User $user, $entity)
	{
		return $entity->editors->get()->findBy(['id' => $user->id])->count();
	}

}
