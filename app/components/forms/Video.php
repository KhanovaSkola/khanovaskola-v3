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
			$this->orm->videos->attach($video);
		}

		$video->title = $v->title;
		$video->description = $v->description;
		$video->youtubeId = $v->youtubeId;

		$this->orm->flush();

		$this->queue->enqueue(new Tasks\UpdateVideo($video));

		$this->presenter->redirect('this', [
			'videoId' => $video->id,
			'blockId' => $this->presenter->block->id,
			'schemaId' => $this->presenter->schema->id
		]);
	}
}
