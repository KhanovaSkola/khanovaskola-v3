<?php

namespace App\Components;

use App\InvalidArgumentException;
use App\InvalidStateException;
use App\Orm\Entity;
use Nette\Forms\Controls;


abstract class FormWrapper extends Control
{

	/** @var Entity */
	private $entity;

	/** @var bool */
	private $entitySet = FALSE;

	/**
	 * @param NULL|Entity $entity
	 *
	 * @throws \App\InvalidStateException
	 * @throws \App\InvalidArgumentException
	 */
	public function setEntity($entity)
	{
		if ($entity !== NULL && ! $entity instanceof Entity)
		{
			throw new InvalidArgumentException;
		}
		if ($this->entitySet)
		{
			throw new InvalidStateException;
		}
		$this->entitySet = TRUE;
		$this->entity = $entity;
	}

	public function createComponentForm()
	{
		if (!$this->entitySet)
		{
			throw new InvalidStateException;
		}

		$form = new Form;

		$this->setup($form);
		if ($this->entity)
		{
			$this->setupEdit($form, $this->entity);
			$form->onSuccess[] = function(Form $form) {
				$this->onEdit($form, $this->entity);
			};
		}
		else
		{
			$this->setupAdd($form);
			$form->onSuccess[] = $this->onAdd;
		}

		return $form;
	}

	public function beforeRender()
	{
		$this->template->editMode = (bool) $this->entity;
	}

	abstract protected function setup(Form $form);

	abstract protected function setupAdd(Form $form);

	abstract protected function setupEdit(Form $form, Entity $entity);

	abstract public function onAdd(Form $form);

	abstract public function onEdit(Form $form, Entity $entity);

}
