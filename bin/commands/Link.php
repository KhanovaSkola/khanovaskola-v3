<?php

namespace Bin\Commands;

use App\Presenters\Homepage;
use Nette\Application\PresenterFactory;
use Nette\Application\UI\Presenter;
use Symfony\Component\Console\Input\InputArgument;


class Link extends Command
{

	protected function configure()
	{
		$this->setName('link')
			->setDescription('Generate url from router path')
			->addArgument('target', InputArgument::REQUIRED, 'such as Homepage:profile or //Auth:in');
	}

	public function invoke(PresenterFactory $fact)
	{
		/** @var Homepage $presenter */
		$presenter = $fact->createPresenter('Homepage');

		$ref = new \ReflectionProperty(Presenter::class, 'globalParams');
		$ref->setAccessible(TRUE);
		$ref->setValue($presenter, []);

		$args = [];
		foreach ($this->in->getVariadics() as $part)
		{
			list($key, $val) = explode('=', $part);
			$args[$key] = $val;
		}
		$link = $presenter->link($this->in->getArgument('target'), $args);
		$this->out->writeln($link);
	}

}
