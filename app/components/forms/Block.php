<?php

namespace App\Components\Forms;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use Nette\Forms\Container;
use Nette\Utils\Json;


class Block extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	public function setup()
	{
		$this->addText('title');
		$this->addText('description');
		$this->addHidden('contents');

		$this->addSubmit();
	}

	public function onSuccess()
	{
		$v = $this->getValues();

		$block = $this->presenter->block;
		if (!$block)
		{
			$block = new Rme\Block();
			$this->orm->blocks->attach($block);

			$block->author = $this->presenter->userEntity;
		}

		$block->title = $v->title;
		$block->description = $v->description;
		$block->contentBlockBridges = [];

		$position = 0;
		$contentIds = Json::decode($v->contents);
		foreach (array_unique($contentIds) as $contentId)
		{
			$bridge = new Rme\ContentBlockBridge();
			$bridge->block = $block;
			$bridge->content = $contentId;
			$bridge->position = $position++;

			/** @var \Orm\OneToMany $block->contentBlockBridges */
			$block->contentBlockBridges->add($bridge);
		}

		$this->orm->flush();

		$this->presenter->redirect('this', [
			'blockId' => $block->id,
			'schemaId' => $this->presenter->schema->id
		]);
	}
}
