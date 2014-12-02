<?php

namespace App\Models\Services;

use Nette\Caching\Storages\FileStorage;


class SubtitleStorage extends FileStorage
{

	protected function getCacheFile($key)
	{
		return parent::getCacheFile($key);
	}

}
