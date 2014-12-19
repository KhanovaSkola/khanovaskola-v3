<?php

namespace App\Components\Forms;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use App\Models\Services\Queue;
use App\Models\Services\SchemaLayout;
use App\Models\Tasks;
use Nette\Utils\Json;


class Schema extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

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
		$this->addSelect('subject', NULL, $this->orm->subjects->findAll()->fetchPairs('id', 'title'));
		$this->addText('title');
		$this->addText('description');
		$this->addHidden('layout');

		$this->addSubmit();
	}

	public function onSuccess()
	{
		$v = $this->getValues();

		$parsed = Json::decode($v->layout);
		$parsed = $this->schemaLayout->normalize($parsed);

		$schema = $this->presenter->schema;
		if (!$schema)
		{
			$schema = new Rme\Schema();
			$this->orm->schemas->attach($schema);

			$schema->author = $this->presenter->userEntity;
			$schema->blockSchemaBridges = [];
		}

		$schema->title = $v->title;
		$schema->description = $v->description;
		$schema->subject = $v->subject;
		$schema->layout = $parsed;

		foreach ($this->schemaLayout->buildBlockDependencies($parsed) as $blockId => $deps)
		{
			$block = $this->orm->blocks->getById($blockId);
			$block->dependencies = $deps;
		}

		$this->orm->flush();
		$this->presenter->purgeHeaderTemplateCache();

		$this->queue->enqueue(new Tasks\UpdateSchema($schema));

		$this->presenter->redirect('this', ['schemaId' => $schema->id]);
	}
}
