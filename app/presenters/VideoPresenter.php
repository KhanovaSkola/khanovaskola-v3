<?php

namespace App\Presenters;

use App\Rme\Video;
use App\Services\PathFinder;
use Nette\Http\Session;


final class VideoPresenter extends BasePresenter
{

	/**
	 * @var int
	 * @persistent
	 */
	public $videoId;

	/** @var Video */
	protected $video;

	public function startup()
	{
		parent::startup();

		if (!$this->video = $this->orm->videos->getById($this->videoId))
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
		$this->template->video = $this->video;

		/** @var Session $session */
		$session = $this->context->getService('session');
		$section = $session->getSection('paths');
		$section->steps = [4, 4]; // TODO save automatically all paths this video is part of

		/** @var PathFinder $finder */
		$finder = $this->context->getService('pathFinder');
		$this->template->suggestions = $finder->suggestNext($this->video);
	}

}
