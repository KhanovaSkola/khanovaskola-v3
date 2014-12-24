<?php

namespace App\Components\Forms;

use App\Models\Rme;
use App\Models\Services\Queue;
use App\Models\Tasks;


class Video extends EditorForm
{

	/**
	 * @var Queue
	 * @inject
	 */
	public $queue;

	public function setup()
	{
		$this->addText('title')
			->setRequired('title.missing');
		$this->addText('description')
			->setRequired('description.missing');
		$this->addText('youtubeId')
			->setRequired('youtubeId.missing');

		$this->addSubmit();
	}

	protected function process()
	{
		$v = $this->getValues();

		$video = $this->presenter->video;
		if (!$video)
		{
			$video = new Rme\Video();
			$this->orm->contents->attach($video);
		}

		$video->title = $v->title;
		$video->description = $v->description;
		$video->youtubeId = $v->youtubeId;

		$this->orm->flush();

		$this->queue->enqueue(new Tasks\UpdateVideo($video));

		$block = $this->presenter->block;
		$schema = $this->presenter->schema;
		$this->presenter->redirect('this', [
			'videoId' => $video->id,
			'blockId' => $block ? $block->id : NULL,
			'schemaId' => $schema ? $schema->id : NULL,
		]);
	}
}
