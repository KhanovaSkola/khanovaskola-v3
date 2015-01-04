<?php

namespace App\Components\Forms;

use App\Components\Controls\EditorSelector;
use App\Models\Rme;
use Nette\Utils\Json;


class Block extends EditorForm
{

	public function setup()
	{
		$this->addText('title')
			->setRequired('title.missing');
		$this->addText('description')
			->setRequired('description.missing');
		$this->addEditorSelector('editors', $this->orm);
		$this->addHidden('contents');

		$this->addSubmit();
	}

	protected function process()
	{
		$v = $this->getValues();

		$block = $this->presenter->block;
		$mode = 'edited';
		if (!$block)
		{
			$block = new Rme\Block();
			$this->orm->blocks->attach($block);

			$block->author = $this->presenter->userEntity;
			$mode = 'added';
		}

		/** @var self|EditorSelector[] $this */
		if ($this['editors']->isEditable())
		{
			$block->editors = array_filter($v->editors, function($id) use ($block) {
				return $id !== $block->author->id;
			});
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

		$this->presenter->flashSuccess("editor.$mode.block");
		$schema = $this->presenter->schema;
		$this->presenter->redirect('this', [
			'blockId' => $block->id,
			'schemaId' => $schema ? $schema->id : NULL,
		]);
	}

}
