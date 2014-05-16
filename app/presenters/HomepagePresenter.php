<?php

namespace App\Presenters;

use App\Components\GistRenderer;


final class HomepagePresenter extends BasePresenter
{

	public function actionDefault()
	{
//		$p = new Path();
//		$p->list = [
//			$this->orm->videos->getById(1),
//			$this->orm->videos->getById(3),
//			$this->orm->blueprints->getById(1),
//			$this->orm->videos->getById(2),
//			$this->orm->videos->getById(5),
//		];
//		//
//		$this->orm->paths->attach($p);
//		$p->getRepository()->getMapper(); // HACK, move events to repository
//		$this->orm->flush();

//		$path = $this->orm->paths->getById(1);
//		$path->list = [
//			$this->orm->videos->getById(4),
//			$this->orm->videos->getById(3),
//			$this->orm->blueprints->getById(1),
//			$this->orm->videos->getById(2),
//			$this->orm->videos->getById(5),
//		];
//		$this->orm->flush();

		$this->template->video = $this->orm->videos->getById(3);

		$gist = $this->orm->gists->getByName('test');
		/** @var GistRenderer $gistRenderer */
		$gistRenderer = $this['gist'];
		$gistRenderer->setEditable(TRUE);
		$gistRenderer->setGist($gist);
	}

}
