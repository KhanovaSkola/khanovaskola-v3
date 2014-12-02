<?php

namespace App\Models\Services;

use Nette\Caching\Cache;
use Nette\Utils\Strings;


class SubtitleCache extends Cache
{

	protected function generateKey($key)
	{
		return Strings::toAscii($key) . '.srt';
	}

}
