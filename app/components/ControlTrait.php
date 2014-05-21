<?php

namespace App\Components;

use App\Orm\ContentEntity;
use App\Orm\Highlight;
use Kdyby\Events\EventArgsList;
use Kdyby\Events\NotSupportedException;
use Nette\Application\UI\Control as NControl;
use Nette\Application\UI\ITemplateFactory;


trait ControlTrait
{

	use FlashTrait;

	/**
	 * Does not flush automatically!
	 * @param $event
	 * @param array $args
	 */
	protected function trigger($event, array $args = [])
	{
		$this->getThisAsControl()->eventManager->dispatchEvent($event, new EventArgsList($args));
	}

	public function link($destination, $args = [])
	{
		if ($destination instanceof Highlight)
		{
			$destination = $destination->getEntity();
		}
		if ($destination instanceof ContentEntity)
		{
			$type = $destination->getShortEntityName();
			$param = lcFirst($type) . 'Id';
			return parent::link("$type:", [$param => $destination->id]);
		}

		return parent::link($destination, $args);
	}

	public function createComponentGist()
	{
		return new GistRenderer($this->getThisAsControl()->translator, $this->getTemplateFactoryInTrait());
	}

	public function createComponentSearch()
	{
		return new Search($this->getThisAsControl()->translator, $this->getTemplateFactoryInTrait());
	}

	public function createComponentColumnChart()
	{
		return new ColumnChart($this->getThisAsControl()->translator, $this->getTemplateFactoryInTrait());
	}

	/**
	 * @return NControl $this
	 * @throws \Kdyby\Events\NotSupportedException
	 */
	private function getThisAsControl()
	{
		if (! $this instanceof NControl)
		{
			throw new NotSupportedException;
		}
		return $this;
	}

	/**
	 * @return ITemplateFactory
	 */
	private function getTemplateFactoryInTrait()
	{
		return $this->getThisAsControl()->getPresenter()->getTemplateFactory();
	}

}
