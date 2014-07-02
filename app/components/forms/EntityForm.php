<?php

namespace App\Components\Forms;

use App\InvalidArgumentException;
use App\Models\Orm\Entity;
use App\Models\Orm\RepositoryContainer;
use Nette;


abstract class EntityForm extends Form
{

	/**
	 * @var Entity
	 */
	protected $entity;

	/**
	 * @var RepositoryContainer
	 */
	protected $repos;

	public function __construct($entity, RepositoryContainer $repos)
	{
		if ($entity && !($entity instanceof Entity))
		{
			throw new InvalidArgumentException;
		}
		$this->entity = $entity;
		$this->repos = $repos;

		parent::__construct();
	}

	public function isEditing()
	{
		return (bool) $this->entity;
	}

	public function isAdding()
	{
		return !$this->isEditing();
	}

	final public function setup()
	{
		$this->setupBoth();
		if (!$this->entity)
		{
			$this->setupAdd();
		}
		else
		{
			$this->setupEdit($this->entity);
		}
	}

	final public function onSuccess()
	{
		if (!$this->entity)
		{
			$this->onAdd();
		}
		else
		{
			$this->onEdit($this->entity);
		}
	}

	abstract public function setupBoth();

	public function setupAdd()
	{
	}

	/**
	 * First argument is current entity
	 * @return mixed
	 */
	public function setupEdit()
	{
	}

	abstract public function onAdd();

	/**
	 * First argument is current entity
	 * @return mixed
	 */
	abstract public function onEdit();

}
