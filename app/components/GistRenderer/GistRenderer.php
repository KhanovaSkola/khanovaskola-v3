<?php

namespace App\Components;

use App\Model\Gist;


class GistRenderer extends Control
{

	/** @var Gist */
	private $gist;

	public function setGist(Gist $gist)
	{
		$this->gist = $gist;
	}

	protected function renderDefault()
	{
		$this->template->gist = $this->gist;
	}

	public function handleSave()
	{
		if (!$this->presenter->isAjax())
		{
			$this->error();
		}
		$text = $this->presenter->getRequest()->getPost()['text'];
		$this->gist->text = $text;
		$this->gist->model->flush();
		$this->presenter->sendJson(['saved' => TRUE]);
	}

}
