<?php

namespace App\Components\Forms;

use App\Models\Rme;
use App\Models\Services\Queue;
use App\Models\Services\SchemaLayout;
use App\Models\Tasks;
use Nette\Utils\Json;


class Schema extends EditorForm
{

	/**
	 * @var SchemaLayout
	 * @inject
	 */
	public $schemaLayout;

	/**
	 * @var Queue
	 * @inject
	 */
	public $queue;

	public function setup()
	{
		$this->addSelect('subject', NULL, $this->orm->subjects->findAll()->fetchPairs('id', 'title'))
			->setRequired('subject.missing');
		$this->addText('title')
			->setRequired('title.missing');
		$this->addText('description')
			->setRequired('description.missing');
		$this->addHidden('layout');

		$this->addSubmit();
	}

	protected function process()
	{
		$v = $this->getValues();

		$parsed = Json::decode($v->layout);
		$parsed = $this->schemaLayout->normalize($parsed);

		$schema = $this->presenter->schema;
		$mode = 'edited';
		if (!$schema)
		{
			$schema = new Rme\Schema();
			$this->orm->schemas->attach($schema);

			$schema->author = $this->presenter->userEntity;
			$schema->blockSchemaBridges = [];

			$mode = 'added';
		}

		/** @var Rme\Subject $subject */
		$subject = $this->orm->subjects->getById($v->subject);

		$schema->title = $v->title;
		$schema->description = $v->description;
		$schema->subject = $subject;
		$schema->layout = $parsed;

		$schema->position = $subject->schemas->count();

		foreach ($this->schemaLayout->buildBlockDependencies($parsed) as $blockId => $deps)
		{
			$block = $this->orm->blocks->getById($blockId);
			$block->dependencies = $deps;
		}

		$this->orm->flush();
		$this->presenter->purgeHeaderTemplateCache();

		$this->queue->enqueue(new Tasks\UpdateSchema($schema));

		$this->presenter->flashSuccess("editor.$mode.schema");
		$this->presenter->redirect('this', ['schemaId' => $schema->id]);
	}
}
