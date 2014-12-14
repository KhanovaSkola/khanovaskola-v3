<?php

namespace App\Components\Forms;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use Nette\Forms\Container;
use Nette\Utils\Json;


class Video extends Form
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

		// TODO if youtube id changed, enqueue update duration, preview etc

		$this->presenter->redirect('this', [
			'videoId' => $video->id,
			'blockId' => $this->presenter->block->id,
			'schemaId' => $this->presenter->schema->id
		]);
	}
}
