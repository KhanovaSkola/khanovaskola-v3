<?php

namespace App\Models\Structs;

use App\InvalidStateException;
use App\Models\Orm\Entity;
use App\Models\Orm\TitledEntity;
use App\Models\Rme\Block;
use App\Models\Rme\Schema;
use App\Models\Rme\Subject;
use App\NotImplementedException;
use Nette\Object;


class AclApproval extends Object
{

	const PRIVILEGE = 1;
	const EDITOR = 2;
	const AUTHOR = 3;

	/**
	 * @var int
	 */
	protected $reason;

	/**
	 * @var NULL|Entity
	 */
	protected $entity;

	public function __construct($reason, Entity $entity = NULL)
	{
		if ($reason !== self::PRIVILEGE && ! $entity instanceof TitledEntity)
		{
			throw new InvalidStateException;
		}

		$this->reason = $reason;
		$this->entity = $entity;
	}

	/**
	 * @return int
	 */
	public function getReason()
	{
		return $this->reason;
	}

	/**
	 * @return NULL|Entity
	 */
	public function getEntity()
	{
		return $this->entity;
	}

	public function toString(Entity $for)
	{
		if ($this->reason === self::PRIVILEGE)
		{
			return 'administrátor';
		}

		if ($this->reason === self::AUTHOR)
		{
			$role = 'autor';
		}
		else if ($this->reason === self::EDITOR)
		{
			$role = 'editor';
		}

		$name = $this->entity->title;
		if ($this->entity instanceof Subject)
		{
			$type = 'předmětu';
		}
		else if ($this->entity instanceof Schema)
		{
			$type = 'schématu';
		}
		else if ($this->entity instanceof Block)
		{
			$type = 'bloku';
		}
		else
		{
			throw new NotImplementedException;
		}

		if ($for === $this->entity)
		{
			return "$role tohoto $type";
		}
		return "$role $type $name";
	}

}
