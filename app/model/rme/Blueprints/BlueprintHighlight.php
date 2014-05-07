<?php

namespace App\Rme;

use App\Orm\Highlight;
use Nette\Utils\Strings;


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
