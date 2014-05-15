<?php

namespace App\Services;

use App\Rme\RepositoryContainer;
use App\Rme\User;
use App\Rme\Video;
use Nette\Http\Session;
use Nette\Object;


class PathFinder extends Object
{

	/** @var \App\Rme\RepositoryContainer */
	protected $orm;

	/** @var \Nette\Http\Session */
	protected $session;

	public function __construct(RepositoryContainer $orm, Session $session)
	{
		$this->orm = $orm;
		$this->session = $session;
	}

	/**
	 * @param Video $video
	 * @return Video[] ordered by best path match
	 */
	public function suggestNext(Video $video)
	{
		$res = $this->orm->videos->getNextFor($video);
		$ids = [];
		$scores = [];
		foreach ($res as &$row)
		{
			$ids[] = $row->videoId;
			$scores[$row->videoId] = 0;
		}

		$session = $this->session->getSection('paths');
		foreach ($session->steps ?: [] as $step)
		{
			foreach ($res as &$row)
			{
				if ((int) $row->pathId === $step)
				{
					$scores[$row->videoId]++;
				}
			}
		}

		$videos = $this->orm->videos->findById($ids)->fetchAll();

		usort($videos, function($a, $b) use ($scores) {
			return $scores[$a->id] > $scores[$b->id];
		});

		return $videos;
	}

}
