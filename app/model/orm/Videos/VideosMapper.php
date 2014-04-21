<?php

namespace App\Model;


use App\Services\ElasticSearch;
use Orm\EventArguments;
use Orm\IRepository;


class VideosMapper extends Mapper
{

	/** @var \App\Services\ElasticSearch */
	protected $elastic;

	public function __construct(IRepository $repository, ElasticSearch $elastic)
	{
		parent::__construct($repository);
		$this->elastic = $elastic;

		$events = $repository->getEvents();
		$events->addCallbackListener($events::PERSIST_AFTER, function(EventArguments $args) {
			/** @var Video $e */
			$e = $args->entity;
			$this->elastic->addToIndex('video', $e->id, [
				'title' => $e->title,
				'description' => $e->description,
				'subtitles' => $e->getSubtitles(),
			]);
		});
	}



}
