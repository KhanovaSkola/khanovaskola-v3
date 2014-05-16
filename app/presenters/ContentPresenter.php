<?php

namespace App\Presenters;

use App\Model\EventList;
use App\Orm\ContentEntity;
use App\Rme\Answer;
use App\Rme\Blueprint;
use App\Rme\BlueprintCompiler;
use App\Services\PathFinder;
use Nette\Application\UI\Form;
use Nette\Forms\Controls\TextInput;
use Nette\Http\Session;


abstract class ContentPresenter extends BasePresenter
{

	public function beforeRender()
	{
		$this->setLayout('content');
	}

	public function getSuggestions(ContentEntity $entity)
	{
		/** @var Session $session */
		$session = $this->context->getService('session');
		$section = $session->getSection('paths');
		$section->steps = [4, 4]; // TODO save automatically all paths this video is part of

		/** @var PathFinder $finder */
		$finder = $this->context->getService('pathFinder');

		return $finder->suggestNext($entity);
	}

}
