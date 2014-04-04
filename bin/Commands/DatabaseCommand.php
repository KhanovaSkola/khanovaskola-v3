<?php

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class DatabaseCommand extends Command
{

    protected function actionPopulate(InputInterface $input, OutputInterface $output)
    {
	    // robot loader
	    $container = require __DIR__ . '/../../app/bootstrap.php';

	    /** @var $orm \App\Model\RepositoryContainer */
	    $orm = $container->getService('orm');

	    $map = [
		    'App\Model\User' => 'users',
		    'App\Model\Event' => 'events',
	    ];

	    $loader = new \Nelmio\Alice\Loader\Porm('cs_CZ');
	    $loader->setOrmMap($orm, $map);
	    $loader->setLogger(function($log) use ($output) {
		    $output->writeln("<info>$log</info>");
	    });

	    $objects = $loader->load(__DIR__ . '/../fixtures.yml');

	    try {
		    $persist = new \Nelmio\Alice\ORM\Porm($orm, $map);
		    $persist->persist($objects);
	    } catch (DibiDriverException $e) {
		    if ($e->getCode() !== 1062)
		    {
			    throw $e;
		    }
			$output->writeln("<error>Duplicate entry, you are probably running on already populated database</error>");
	    }
    }
}
