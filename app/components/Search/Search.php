<?php

namespace App\Components;

use Nette\Application\UI\Form;


class Search extends Control
{

	protected function renderDefault()
	{
	}

	protected function createComponentForm()
	{
		$form = new Form();

		$form->addText('query');

		$form->addSubmit('search');
		$form->onSuccess[] = $this->onSuccess;

		return $form;
	}

	public function onSuccess(Form $form)
	{
		$this->presenter->redirect('Search:results', ['query' => $form->values->query]);
	}

}
