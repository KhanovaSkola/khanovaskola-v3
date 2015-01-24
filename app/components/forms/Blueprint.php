<?php

namespace App\Components\Forms;

use App\BlueprintCompilerException;
use App\Models\Rme;
use App\Models\Services\BlueprintCompiler;
use Nette\Forms\Container;
use Nette\Forms\Controls\TextInput;


class Blueprint extends EntityForm
{

	/**
	 * @var BlueprintCompiler
	 * @inject
	 */
	public $compiler;

	public function setupBoth()
	{
		$this->addText('title')
			->setRequired('title.missing');
		$this->addText('description')
			->setRequired('description.missing');

		$this->addTextArea('question')
			->setRequired('question.missing');
		$this->addText('answer')
			->setRequired('answer.missing');

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
	 * @param Rme\Blueprint $blueprint
	 * @return mixed|void
	 */
	public function setupEdit(Rme\Blueprint $blueprint = NULL)
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

		$this->repos->contents->persist($blueprint);
		$this->repos->contents->flush();

		$this->iLog('form.blueprint.add', ['blueprint' => $blueprint->id]);
		$this->presenter->flashSuccess('blueprintEditor.submit.new');
		$this->presenter->redirect('this', ['blueprintId' => $blueprint->id]);
	}

	/**
	 * @param Rme\Blueprint $blueprint
	 * @return mixed|void
	 */
	public function onEdit(Rme\Blueprint $blueprint = NULL)
	{
		$this->updateBlueprint($this->values, $blueprint);
		$this->repos->flush();

		$this->iLog('form.blueprint.edit', ['blueprint' => $blueprint->id]);

		try
		{
			$this->compiler->compile($blueprint);
		}
		catch (BlueprintCompilerException $e)
		{
			$this->presenter->flashError('blueprintEditor.submit.error', NULL, ['error' => $e->getMessage()]);
			return;
		}

		$this->presenter->flashSuccess('blueprintEditor.submit.edit');
		$this->presenter->redirect('this', ['blueprintId' => $blueprint->id]);
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
