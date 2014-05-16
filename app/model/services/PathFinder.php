<?php

namespace App\Services;

use App\Orm\ContentEntity;
use App\Orm\ContentRepository;
use App\Rme\RepositoryContainer;
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
	 * @param ContentEntity $entity
	 * @return ContentEntity[] ordered by best path match
	 */
	public function suggestNext(ContentEntity $entity)
	{
		/** @var ContentRepository $repo */
		$repo = $entity->getRepository();
		$res = $repo->getNextContent($entity);
		foreach ($res as &$row)
		{
			$row->score = 0;
		}

		$session = $this->session->getSection('paths');
		foreach ($session->steps ?: [] as $step)
		{
			foreach ($res as &$row)
			{
				if ((int) $row->pathId === $step)
				{
					$row->score++;
				}
			}
		}

		usort($res, function($a, $b) use ($res) {
			return $a->score > $b->score;
		});

		$entities = [];
		foreach ($res as $row)
		{
			/** @var ContentRepository $repo */
			$repo = $this->orm->getByEntityName($row->entityType);
			$entities[] = $repo->getById($row->entityId);
		}

		return $entities;
	}

}
