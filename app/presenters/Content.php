<?php

namespace App\Presenters;

use App\Models\Rme;


abstract class Content extends Presenter
{

	public function getSuggestions(Rme\Content $entity)
	{
		return [];
	}

}
