<?php

namespace App\Presenters;

use App\Components\GistRenderer;
use App\Rme\Path;
use Nette\Http\Session;


final class HomepagePresenter extends BasePresenter
{

	public function actionDefault()
	{
//		$p = new Path();
//		$p->list = [
//			$this->orm->videos->getById(1),
//			$this->orm->videos->getById(3),
//			$this->orm->videos->getById(2),
//			$this->orm->videos->getById(5),
//		];
//
//		$this->orm->paths->attach($p);
//		$p->getRepository()->getMapper(); // HACK, move events to repository
//		$this->orm->flush();
//		dump('done');

		$this->template->video = $this->orm->videos->getById(3);

		$gist = $this->orm->gists->getByName('test');
		/** @var GistRenderer $gistRenderer */
		$gistRenderer = $this['gist'];
		$gistRenderer->setEditable(TRUE);
		$gistRenderer->setGist($gist);
	}

}
