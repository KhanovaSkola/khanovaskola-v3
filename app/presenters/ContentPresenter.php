<?php

namespace App\Presenters;

use App\Orm\ContentEntity;
use App\Services\PathFinder;
use Nette\Http\Session;


abstract class ContentPresenter extends BasePresenter
{

	/** @var PathFinder @inject */
	public $pathFinder;

	public function beforeRender()
	{
		$this->setLayout('content');
	}

	public function getSuggestions(ContentEntity $entity)
	{
		$section = $this->session->getSection('paths');
		$section->steps = [4, 4]; // TODO save automatically all paths this video is part of

		return $this->pathFinder->suggestNext($entity);
	}

}
