<?php

namespace App\Components;

use App\Orm\Entity;
use App\Rme\Blueprint;
use Nette\Application\UI\Form;
use Nette\ComponentModel\IContainer;


class BlueprintForm extends FormWrapper
{

	protected function setup(Form $form)
	{
		$form->addText('title');
		$form->addText('description');
		$form->addSubmit('send');
	}

	protected function setupAdd(Form $form)
	{
	}

	/**
	 * @param Form $form
	 * @param Entity|Blueprint $blueprint
	 */
	protected function setupEdit(Form $form, Entity $blueprint)
	{
		$form->setDefaults([
			'title' => $blueprint->title,
			'description' => $blueprint->description,
		]);
	}

	public function onAdd(Form $form)
	{
		dump('add');
		dump($form->values);
	}

	public function onEdit(Form $form, Entity $entity)
	{
		dump('edit');
		dump($form->values);
	}

}
