<?php

namespace App\Components;

use App\Orm\ContentEntity;
use App\Orm\Highlight;
use Kdyby\Events\EventArgsList;
use Nette\Application\UI\Control as NControl;


/**
 * Must be used only by NConrol
 */
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
		/** @var NControl $this */
		$this->eventManager->dispatchEvent($event, new EventArgsList($args));
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

			$args = [$param => $destination->id];
			$destination = "$type:";
		}

		/** @noinspection PhpDynamicAsStaticMethodCallInspection */
		return NControl::link($destination, $args);
	}

	public function createComponentGist()
	{
		/** @var NControl $this */
		return new GistRenderer($this->translator, $this->getPresenter()->getTemplateFactory());
	}

	public function createComponentSearch()
	{
		/** @var NControl $this */
		return new Search($this->translator, $this->getPresenter()->getTemplateFactory());
	}

	public function createComponentColumnChart()
	{
		/** @var NControl $this */
		return new ColumnChart($this->translator, $this->getPresenter()->getTemplateFactory());
	}

}
