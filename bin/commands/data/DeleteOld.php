<?php

namespace Bin\Commands\Data;

use App\Models\Orm\RepositoryContainer;
use Bin\Commands\Command;


class DeleteOld extends Command
{

	protected function configure()
	{
		$this->setName('data:delete-old')
			->setDescription('Removes all old empty entities');
	}

	public function invoke(RepositoryContainer $orm)
	{
		$orm->users->deleteOldEmpty();
		$orm->videoViews->deleteOldEmpty();
	}

}
