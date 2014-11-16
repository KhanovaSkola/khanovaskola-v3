<?php

namespace App\Components\Controls;

use App\Components\Control;
use Nette\Application\UI\Form;


class Search extends Control
{

	protected function renderDefault(array $args = [])
	{
		$args = $args + [
			'label' => NULL,
			'class' => NULL,
		];
		foreach ($args as $k => $v)
		{
			$this->template->$k = $v;
		}
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
