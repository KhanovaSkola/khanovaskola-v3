<?php

namespace App\Presenters;

use App\Components\GistRenderer;


final class HomepagePresenter extends BasePresenter
{

	public function actionDefault()
	{
		$this->template->video = $this->orm->videos->getById(3);

		$gist = $this->orm->gists->getByName('test');
		/** @var GistRenderer $gistRenderer */
		$gistRenderer = $this['gist'];
		$gistRenderer->setEditable(TRUE);
		$gistRenderer->setGist($gist);
	}

}
