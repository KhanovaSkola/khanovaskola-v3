<?php

namespace App\Components\Forms;

use App\BlueprintCompilerException;
use App\Models\Orm\RepositoryContainer;
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
			->setRequired('form.title.missing');
		$this->addText('description')
			->setRequired('form.description.missing');
		$this->addDynamic('vars', function(Container $container) {
			$container->addText('name');
			$container->addText('definition');
		});

		$this->addDynamic('partials', function(Container $container) {
			$container->addTextArea('question')
				->setRequired('form.question.missing');
			$container->addText('answer')
				->setRequired('form.answer.missing');

			$container->addDynamic('hints', function(Container $container) {
				$container->addText('hint');
			});
		});

		$this->addSubmit();
	}

	public function setupAdd()
	{
		$this['partials']->createOne();
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
		]);

		foreach ($blueprint->partials as $partial)
		{
			$id = (string) $partial->id;
			$this['partials'][$id]->setDefaults([
				'question' => $partial->question,
				'answer' => $partial->answer,
			]);

			foreach ($partial->hints as $i => $hint)
			{
				/** @var TextInput $input */
				$input = $this['partials'][$id]['hints'][$i]['hint'];
				$input->setValue($hint);
			}
		}

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
	}

	public function onAdd()
	{
		$blueprint = $this->updateBlueprint($this->values, new Rme\Blueprint);

		$this->repos->contents->persist($blueprint);
		$this->repos->flush();

		// TODO run onEdit compiler check as well

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

		$vars = [];
		foreach ($v->vars as $row)
		{
			if ($row->name && $row->definition)
			{
				$vars[$row->name] = json_decode($row->definition);
			}
		}
		$blueprint->vars = $vars;

		$this->repos->contents->attach($blueprint);

		foreach ($v->partials as $id => $values)
		{
			// removed partials are never deleted!

			$partial = $blueprint->partials->get()->getBy(['id' => $id]);
			if (!$partial)
			{
				$partial = new Rme\BlueprintPartial();

				$partial->question = $values->question;
				$partial->answer = $values->answer;

				$partial->hints = [];
				foreach ($values->hints as $hint)
				{
					$partial->addHint($hint);
				}

				$blueprint->partials->add($partial);
			}
		}

		return $blueprint;
	}

}
