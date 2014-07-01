<?php

namespace App\Components\Forms;

use App\Rme;
use Nette\Forms\Container;
use Nette\Forms\Controls\TextInput;


class Blueprint extends EntityForm
{

	public function setupBoth()
	{
		$this->addText('title');
		$this->addTextArea('description');

		$this->addText('question');
		$this->addText('answer');

		$this->addDynamic('vars', function(Container $container) {
			$container->addText('name');
			$container->addText('definition');
		});
		$this->addDynamic('hints', function(Container $container) {
			$container->addText('hint');
		});

		$this->addSubmit();
	}

	/**
	 * @param Blueprint $blueprint
	 * @return mixed|void
	 */
	public function setupEdit(Blueprint $blueprint = NULL)
	{
		$this->setDefaults([
			'title' => $blueprint->title,
			'description' => $blueprint->description,
			'question' => $blueprint->question,
			'answer' => $blueprint->answer,
		]);

		$id = 0;
		foreach ($blueprint->vars as $name => $var)
		{
			/** @var TextInput $input */
			$input = $this['vars'][$id]['name'];
			$input->setValue($name);
			$input = $this['vars'][$id]['definition'];
			$input->setValue(json_encode($var));
			$id++;
		}

		foreach ($blueprint->hints as $i => $hint)
		{
			/** @var TextInput $input */
			$input = $this['hints'][$i]['hint'];
			$input->setValue($hint);
		}
	}

	public function onAdd()
	{
		$blueprint = $this->updateBlueprint($this->values, new Rme\Blueprint);

		$this->blueprints->attach($blueprint);
		$this->blueprints->flush();

		$this->flashSuccess('blueprintEditor.submit.new');
		$this->redirect('this');
	}

	/**
	 * @param Blueprint $blueprint
	 * @return mixed|void
	 */
	public function onEdit(Blueprint $blueprint = NULL)
	{
		$this->updateBlueprint($this->values, $blueprint);
		$this->blueprints->flush();

		$this->flashSuccess('blueprintEditor.submit.edit');
		$this->redirect('this');
	}

	private function updateBlueprint($v, Rme\Blueprint $blueprint)
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
