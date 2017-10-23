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

		$form->setAction('/');
		$form->addHidden('do', 'search-form-submit');

		$form->addText('query');

		$form->addSubmit('search');
                // Deprecated in Nette, see:
                // https://forum.nette.org/cs/27483-accessing-methods-as-properties-via-obj-isemailavailable-is-deprecated
                // $form->onSuccess[] = $this->onSuccess;
                // Using callback instead
		$form->onSuccess[] = [$this, 'onSuccess'];

		return $form;
	}

	public function onSuccess(Form $form)
	{
		$this->presenter->redirect('Search:results', ['query' => $form->values->query]);
	}

}
