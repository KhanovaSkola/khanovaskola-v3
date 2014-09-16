<?php

namespace App\Models\Services;

use App\Models\Orm\ContentRepository;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Content;
use Nette\Http\Session;
use Nette\Object;


class PathFinder extends Object
{

	/**
	 * @var RepositoryContainer
	 */
	protected $orm;

	/**
	 * @var Session
	 */
	protected $session;

	public function __construct(RepositoryContainer $orm, Session $session)
	{
		$this->orm = $orm;
		$this->session = $session;
	}

	/**
	 * @param Content $entity
	 * @return Content[] ordered by best path match
	 */
	public function suggestNext(Content $entity)
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
