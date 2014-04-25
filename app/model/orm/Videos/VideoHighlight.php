<?php

namespace App\Model;

use App\Services\ElasticSearch;
use Nette\Object;


class VideoHighlight extends Highlight
{

	public function getTitle()
	{
		return $this->getHighlit('title') ?: $this->getRaw('title');
	}

	public function getDescription()
	{
		return $this->getHighlit('description') ?: $this->getRaw('description');
	}

	public function getSubtitles()
	{
		$subs = $this->getHighlit('subtitles');
		if ($subs)
		{
			return $subs;
		}

		$text = $this->getRaw('textFromSubtitles');
		return substr($text, 0, 200);
	}

}
