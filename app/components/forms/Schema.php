<?php

namespace App\Components\Forms;

use App\Components\Controls\EditorSelector;
use App\Models\Rme;
use App\Models\Services\SchemaLayout;
use App\Models\Services\UserState;
use App\Models\Structs\EntityPointer;
use App\Models\Tasks;
use Kdyby\RabbitMq\Connection;
use Nette\Utils\Json;


class Schema extends EditorForm
{

	/**
	 * @var SchemaLayout
	 * @inject
	 */
	public $schemaLayout;

	/**
	 * @var Connection
	 * @inject
	 */
	public $queue;

	/**
	 * @var UserState
	 * @inject
	 */
	public $user;

	public function setup()
	{
		$this->addText('title')
			->setRequired('title.missing');
		$this->addText('description')
			->setRequired('description.missing');
		$this->addEditorSelector('editors', $this->orm);
		$this->addHidden('layout');

		$this->addSubmit();
	}

	protected function process()
	{
		$v = $this->getValues();

		$parsed = Json::decode($v->layout);
		$parsed = $this->schemaLayout->normalize($parsed);

		$schema = $this->presenter->getSchema();
		$mode = 'edited';
		if (!$schema)
		{
			$schema = new Rme\Schema();
			$this->orm->schemas->attach($schema);

			$schema->author = $this->presenter->userEntity;
			$schema->blockSchemaBridges = [];

			$mode = 'added';
		}

		/** @var self|EditorSelector[] $this */
		if ($this['editors']->isEditable())
		{
			$schema->editors = $v->editors;
		}

		$schema->title = $v->title;
		$schema->description = $v->description;
		$schema->layout = $parsed;

		foreach ($schema->blocks as $block)
		{
			$block->dependencies = [];
		}
		foreach ($this->schemaLayout->buildBlockDependencies($parsed) as $blockId => $deps)
		{
			/** @var Rme\Block $block */
			$block = $this->orm->blocks->getById($blockId);
			$block->dependencies = $deps;
		}

		$this->orm->flush();
		$this->presenter->purgeCacheTag('header');
		$this->presenter->purgeCacheTag("schema-{$schema->id}");

		$producer = $this->queue->getProducer('updateSchema');
		$producer->publish(serialize([
			'schema' => new EntityPointer($schema),
		]));

		$this->presenter->flashSuccess("editor.$mode.schema");
		$this->presenter->redirect('this', ['schemaId' => $schema->id]);
	}
}
