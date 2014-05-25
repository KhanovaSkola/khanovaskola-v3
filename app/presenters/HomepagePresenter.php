<?php

namespace App\Presenters;


final class HomepagePresenter extends BasePresenter
{

	public function createComponentGist()
	{
		$gist = $this->orm->gists->getByName('test');
		$gistRenderer = parent::createComponentGist();
		$gistRenderer->setEditable(TRUE);
		$gistRenderer->setGist($gist);

		return $gistRenderer;
	}

	public function renderDefault()
	{
		$this->template->video = $this->orm->videos->getById(3);
	}

}
