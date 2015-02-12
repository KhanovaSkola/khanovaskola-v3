<?php

namespace App\Presenters;

use App\Components\Controls\Comments;
use App\Models\Rme;
use App\Presenters\Parameters;


final class Video extends Content
{

	use Parameters\Block;
	use Parameters\Schema;
	use Parameters\Slug;
	use Parameters\Video;

	/**
	 * @var int
	 * @persistent
	 */
	public $startAtTime = 0;

	public function startup()
	{
		parent::startup();

		if ($this->action === 'youtube')
		{
			return;
		}

		$this->loadVideo();
		$this->loadBlock(function() {
			$block = $this->video->getRandomParent();
			if ($block)
			{
				$this->redirectToEntity($this->video, $block);
			}
		});
		$this->loadSchema(function() {
			if (!$this->block)
			{
				return NULL;
			}

			$schema = $this->block->getRandomParent();
			if ($schema)
			{
				$this->redirectToEntity($this->video, $this->block, $schema);
			}
		});

		if ($this->block && !$this->block->contains($this->video))
		{
			$this->redirectToEntity($this->video);
		}
		if ($this->block && $this->schema && !$this->schema->contains($this->block))
		{
			$this->redirectToEntity($this->video);
		}

		$this->checkSlug($this->video);
	}

	public function renderDefault()
	{
		$this->setCacheControlPublic();

		list($nextContent, $nextBlock, $nextSchema) = $this->orm->contents->getNext($this->video, $this->block, $this->schema);

		$this->template->video = $this->video;
		$this->template->block = $this->block;
		$this->template->schema = $this->schema;
		$this->template->nextContent = $nextContent;
		$this->template->nextBlock = $nextBlock;
		$this->template->nextSchema = $nextSchema;
		$this->template->suggestions = $this->getSuggestions($this->video);
		$this->template->position = $this->block ? $this->block->getPositionOf($this->video) : NULL;
		$this->template->startAtTime = $this->startAtTime;
	}

	public function actionYoutube($youtubeId)
	{
		$video = $this->orm->contents->getVideoByYoutubeId($youtubeId);
		if (!$video)
		{
			$this->error();
		}

		$this->redirectToEntity($video);
	}

	public function createComponentComments()
	{
		return $this->buildComponent(Comments::class, [$this->video]);
	}

}
