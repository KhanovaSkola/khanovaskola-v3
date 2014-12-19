<?php

namespace App\Components\Forms;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use App\Models\Services\Queue;
use App\Models\Tasks;


class Video extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	/**
	 * @var Queue
	 * @inject
	 */
	public $queue;

	public function setup()
	{
		$this->addText('title');
		$this->addText('description');
		$this->addText('youtubeId');

		$this->addSubmit();
	}

	public function onSuccess()
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
