<?php

namespace App\Presenters;

use App\Components\Controls\GistRenderer;


final class Homepage extends Presenter
{

	public function createComponentGist()
	{
		$gist = $this->orm->gists->getByName('test');

		/** @var GistRenderer $gistRenderer */
		$gistRenderer = $this->buildComponent(GistRenderer::class);
		$gistRenderer->setEditable(TRUE);
		$gistRenderer->setGist($gist);

		return $gistRenderer;
	}

	public function renderDefault()
	{
		$this->template->video = $this->orm->videos->getById(3);
	}

}
