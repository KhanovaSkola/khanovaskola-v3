<?php

namespace App\Components;

use App\Orm\Entity;
use App\Orm\Repository;
use App\Rme\Blueprint;
use App\Rme\BlueprintsRepository;
use Nette\Forms\Container;
use Nette\Forms\Controls\TextInput;


class BlueprintForm extends FormWrapper
{

	/** @var BlueprintsRepository|Repository */
	private $blueprints;

	public function injectBlueprints(BlueprintsRepository $blueprints)
	{
		$this->blueprints = $blueprints;
	}

	protected function setup(Form $form)
	{
		$form->addText('title');
		$form->addTextArea('description');

		$form->addText('question');
		$form->addText('answer');

		$form->addDynamic('vars', function(Container $container) {
			$container->addText('name');
			$container->addText('definition');
		});
		$form->addDynamic('hints', function(Container $container) {
			$container->addText('hint');
		});

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
			'question' => $blueprint->question,
			'answer' => $blueprint->answer,
		]);

		$id = 0;
		foreach ($blueprint->vars as $name => $var)
		{
			/** @var TextInput $input */
			$input = $form['vars'][$id]['name'];
			$input->setValue($name);
			$input = $form['vars'][$id]['definition'];
			$input->setValue(json_encode($var));
			$id++;
		}

		foreach ($blueprint->hints as $i => $hint)
		{
			/** @var TextInput $input */
			$input = $form['hints'][$i]['hint'];
			$input->setValue($hint);
		}
	}

	public function onAdd(Form $form)
	{
		$blueprint = $this->updateBlueprint($form->values, new Blueprint);

		$this->blueprints->attach($blueprint);
		$this->blueprints->flush();

		$this->flashMessage('add ok');
		$this->redirect('this');
	}

	/**
	 * @param Form $form
	 * @param Entity|Blueprint $entity
	 */
	public function onEdit(Form $form, Entity $entity)
	{
		$this->updateBlueprint($form->values, $entity);
		$this->blueprints->flush();

		$this->flashMessage('edit ok');
		$this->redirect('this');
	}

	private function updateBlueprint($v, Blueprint $blueprint)
	{
		$blueprint->title = $v->title;
		$blueprint->description = $v->description;
		$blueprint->question = $v->question;
		$blueprint->answer = $v->answer;

		$vars = [];
		foreach ($v->vars as $row)
		{
			if ($row->name && $row->definition)
			{
				$vars[$row->name] = json_decode($row->definition);
			}
		}
		$blueprint->vars = $vars;

		$blueprint->hints = [];
		foreach ($v->hints as $row)
		{
			$blueprint->addHint($row->hint);
		}

		return $blueprint;
	}

}
