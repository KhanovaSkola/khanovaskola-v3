<?php

namespace App\Components\Forms;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use App\Models\Services\Queue;
use App\Models\Services\SchemaLayoutNormalizer;
use App\Models\Tasks\UpdateSchema;
use Nette\Utils\Json;


class Schema extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	/**
	 * @var SchemaLayoutNormalizer
	 * @inject
	 */
	public $normalizer;

	/**
	 * @var Queue
	 * @inject
	 */
	public $queue;

	public function setup()
	{
		$this->addSelect('subject', NULL, $this->orm->subjects->findAll()->fetchPairs('id', 'name'));
		$this->addText('title');
		$this->addText('description');
		$this->addHidden('layout');

		$this->addSubmit();
	}

	public function onSuccess()
	{
		$v = $this->getValues();

		$parsed = Json::decode($v->layout);
		$parsed = $this->normalizer->normalize($parsed);

		$schema = $this->presenter->schema;
		if (!$schema)
		{
			$schema = new Rme\Schema();
			$schema->name = 'Random new schema';
			$this->orm->schemas->attach($schema);

			$schema->author = $this->presenter->userEntity;
			$schema->blockSchemaBridges = [];
		}

		$schema->name = $v->title;
		$schema->description = $v->description;
		$schema->subject = $v->subject;
		$schema->layout = $parsed;

		$this->orm->flush();

		$this->queue->enqueue(new UpdateSchema($schema));

		$this->presenter->redirect('this', ['schemaId' => $schema->id]);
	}
}
