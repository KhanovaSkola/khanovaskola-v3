<?php

namespace App\Presenters;

use Nette\Forms\Controls\TextInput;
use Nette\Utils\Strings;


final class Search extends Presenter
{

	public function renderResults($query)
	{
		if (!Strings::trim($query))
		{
			$this->redirect('Subjects:default');
		}

		/** @var TextInput $input */
		$input = $this->getComponent('search-form-query');
		$input->setDefaultValue($query);

		$this->template->query = $query;
		$this->template->search = $this->orm->contents->getWithFulltext($query);
	}

}
