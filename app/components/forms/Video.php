<?php

namespace App\Components\Forms;

use App\Models\Rme;
use App\Models\Structs\EntityPointer;
use App\Models\Tasks;
use DateTime;
use Kdyby\RabbitMq\Connection;
use Nette\Forms\Controls\BaseControl;


class Video extends EditorForm
{

	/**
	 * @var Connection
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
		$this->addCheckbox('visible')
			->setDefaultValue(TRUE);
		$this->addCheckbox('removed')
			->setDefaultValue(FALSE);

		$this->addSubmit();
	}

	protected function process()
	{
		$v = $this->getValues();

		$video = $this->presenter->video;
		$mode = 'edited';
		if (!$video)
		{
			$video = new Rme\Video();
			$video->author = $this->presenter->userEntity;
			$this->orm->contents->attach($video);
			$mode = 'added';
		}

		$old = $this->orm->contents->getVideoByYoutubeId($v->youtubeId);
		if ($old && ($mode === 'added' || $old->id !== $video->id))
		{
			/** @var self|BaseControl[] $this */
			$this['youtubeId']->addError('Toto youtubeId už v databázi existuje.');
			return FALSE;
		}

		$video->title = $v->title;
		$video->description = $v->description;
		$video->youtubeId = $v->youtubeId;
		$video->hidden = $v->removed || !$v->visible;

		if ($v->removed && !$video->removedAt) {
			$video->removedAt = new DateTime();
		} elseif (!$v->removed && $video->removedAt) {
			$video->removedAt = NULL;
		}

		$this->orm->flush();

		$producer = $this->queue->getProducer('updateVideo');
		$producer->publish(serialize([
			'video' => new EntityPointer($video),
		]));

		$this->presenter->flashSuccess("editor.$mode.video");

		$block = $this->presenter->block;
		$schema = $this->presenter->schema;
		$this->presenter->redirect('Video:default', [
			'videoId' => $video->id,
			'blockId' => $block ? $block->id : NULL,
			'schemaId' => $schema ? $schema->id : NULL,
		]);

		return TRUE;
	}
}
