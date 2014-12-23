<?php

namespace App\Presenters\Parameters;

use App\Models\Orm\TitledEntity;
use App\Models\Rme;
use App\Presenters\Presenter;


trait Slug
{

	protected function checkSlug(TitledEntity $entity)
	{
		$slug = $entity->slug;

		/** @var Presenter $this */
		if ($this->getParameter('slug') !== $slug)
		{
			$this->redirect('this', ['slug' => $slug]);
		}
	}

}
