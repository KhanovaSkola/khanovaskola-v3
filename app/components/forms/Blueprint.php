<?php

namespace App\Components\Forms;

use App\BlueprintCompilerException;
use App\Models\Rme;
use App\Models\Services\Blueprints\Compiler;
use Nette\Forms\Container;
use Nette\Forms\Controls\TextInput;
use Nette\Utils\Json;


class Blueprint extends EntityForm
{

	/**
	 * @var Compiler
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
		$this->addCheckbox('visible');

		$this->addDynamic('partials', function(Container $container) {
			$container->addTextArea('question')
				->addCondition($this::FILLED)
				->setRequired('form.question.missing');
			$container->addSelect('answerType', NULL, Rme\BlueprintPartial::getAnswerTypes())
				->setTranslator($this->translator->getPrefixed('answerType'));
			$container->addTextArea('data');
			$container->addTextArea('answer')
				->addCondition($this::FILLED)
				->setRequired('form.answer.missing');

			/** @var self|\Kdyby\Replicator\Container[] $container */
			$container->addDynamic('hints', function(Container $container) {
				$container->addTextArea('hint');
			});
		});

		$this->addSubmit();
	}

	public function setupAdd()
	{
		/** @var self|\Kdyby\Replicator\Container[] $this */
		$this['partials']->createOne('new');
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
			'visible' => !$blueprint->hidden,
		]);

		foreach ($blueprint->partials as $partial)
		{
			$id = (string) $partial->id;
			$this['partials'][$id]->setDefaults([
				'question' => $partial->question,
				'answerType' => $partial->answerType,
				'answer' => $partial->answer,
				'data' => Json::encode($partial->data),
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

		/** @var self|\Kdyby\Replicator\Container[] $this */
		$this['partials']->createOne('new');
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
		$blueprint->hidden = !$v->visible;

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
			if (!$values->question && !$values->answer)
			{
				continue;
			}

			// removed partials are never deleted!

			$partial = $blueprint->partials->get()->getBy(['id' => $id]);
			if (!$partial)
			{
				$partial = new Rme\BlueprintPartial();
			}

			$partial->question = $values->question;
			$partial->answerType = $values->answerType;
			$partial->answer = $values->answer;
			$partial->data = Json::decode($values->data, Json::FORCE_ARRAY);

			$partial->hints = [];
			foreach ($values->hints as $i => $container)
			{
				if ($container->hint)
				{
					$partial->addHint($container->hint);
				}
			}

			$blueprint->partials->add($partial);
		}

		return $blueprint;
	}

}
