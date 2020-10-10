<?php

namespace App\Models\Services;

use App\Models\Orm\Entity;
use App\Models\Rme\Block;
use App\Models\Rme\Content;
use App\Models\Rme\Schema;
use App\Models\Rme\Subject;
use App\Models\Rme\User;
use App\Models\Structs\AclApproval;


class Acl
{

	const ALL = 'all';
	const ADD_SCHEMA = 'add_schema';
	const ADD_BLOCK = 'add_block';
	const ADD_CONTENT = 'add_content';

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

		if ($resource === self::ADD_SCHEMA)
		{
			return $user->subjectsEdited->count();
		}
		if ($resource === self::ADD_BLOCK)
		{
			return $user->subjectsEdited->count() || $user->schemasEdited->count();
		}
		if ($resource === self::ADD_CONTENT)
		{
			return $user->subjectsEdited->count() || $user->schemasEdited->count() || $user->blocksEdited->count();
		}

		if ($resource instanceof Subject)
		{
			return $this->isAllowed_SubjectOnly($user, $resource);
		}
		else if ($resource instanceof Schema)
		{
			return $this->isAllowed_SchemaOrAbove($user, $resource);
		}
		else if ($resource instanceof Block)
		{
			return $this->isAllowed_BlockOrAbove($user, $resource);
		}
		else if ($resource instanceof Content)
		{
			return $this->isAllowed_ContentOrAbove($user, $resource);
		}

		return FALSE;
	}

	protected function isAllowed_ContentOrAbove(User $user, Content $content)
	{
		foreach ($content->blocks as $block)
		{
			if ($r = $this->isAllowed_BlockOrAbove($user, $block))
			{
				return $r;
			}
		}
		return FALSE;
	}

	protected function isAllowed_BlockOrAbove(User $user, Block $block)
	{
		if ($r = $this->isAllowed_BlockOnly($user, $block))
		{
			return $r;
		}

		foreach ($block->schemas as $schema)
		{
			if ($r = $this->isAllowed_SchemaOrAbove($user, $schema))
			{
				return $r;
			}
		}
		return FALSE;
	}

	protected function isAllowed_SchemaOrAbove(User $user, Schema $schema)
	{
		if ($r = $this->isAllowed_SchemaOnly($user, $schema))
		{
			return $r;
		}
		else if ($schema->subject && $r = $this->isAllowed_SubjectOnly($user, $schema->subject))
		{
			return $r;
		}
		return FALSE;
	}

	/**
	 * @param User $user
	 * @param Subject $subject
	 * @return bool|int reason
	 */
	protected function isAllowed_SubjectOnly(User $user, Subject $subject)
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
	protected function isAllowed_SchemaOnly(User $user, Schema $schema)
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
	protected function isAllowed_BlockOnly(User $user, Block $block)
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
