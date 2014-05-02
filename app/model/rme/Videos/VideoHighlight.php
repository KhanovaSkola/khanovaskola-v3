<?php

namespace App\Rme;

use App\Orm\Highlight;
use Nette\Utils\Strings;


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
		$subs = $this->getHighlit('subtitles', TRUE);
		if ($subs)
		{
			return implode(' ', $subs);
		}

		$text = $this->getRaw('textFromSubtitles');
		return Strings::truncate($text, 150);
	}

}
