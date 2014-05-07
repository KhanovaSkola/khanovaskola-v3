<?php

namespace App\Presenters;

use Nette\Forms\Controls\TextInput;


final class SearchPresenter extends BasePresenter
{

	public function actionResults($query)
	{
		/** @var TextInput $input */
		$input = $this->getComponent('search-form-query');
		$input->setDefaultValue($query);

		$this->template->query = $query;
		$this->template->results = (object) [
			'videos' => $this->orm->videos->getWithFulltext($query),
			'exercises' => $this->orm->blueprints->getWithFulltext($query),
		];
	}

}
