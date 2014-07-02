<?php

namespace Bin\Commands\Deploy;


class Development extends Command
{

	protected function configure()
	{
		$this
			->setName('deploy:development')
			->setDescription('Deploys to development server (no stability required)');
	}

	public function getTarget()
	{
		return 'dev';
	}

}
