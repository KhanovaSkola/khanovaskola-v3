<?php

namespace App\Models\Rme;

use App\Models\Orm\Highlight;


class BlueprintHighlight extends Highlight
{

	public function getTitle()
	{
		return $this->getHighlit('title') ?: $this->getRaw('title');
	}

	public function getDescription()
	{
		return $this->getHighlit('description') ?: $this->getRaw('description');
	}

}
