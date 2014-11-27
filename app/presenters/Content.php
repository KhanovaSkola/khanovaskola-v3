<?php

namespace App\Presenters;

use App\Models\Rme;


abstract class Content extends Presenter
{

	public function getSuggestions(Rme\Content $entity)
	{
//		$section = $this->session->getSection('paths');
//		$section->steps = [4, 4]; // TODO save automatically all paths this video is part of

//		return $this->pathFinder->suggestNext($entity);
		return [];
	}

}
