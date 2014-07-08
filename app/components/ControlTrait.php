<?php

namespace App\Components;

use App\Models\Orm\ContentEntity;
use App\Models\Orm\Highlight;
use DateTime;
use Kdyby\Events\EventArgsList;
use Nette\Application\UI\Control as NControl;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\DI\Container;
use Nette\Utils\Html;


/**
 * Must be used only by NControl
 *
 * @property-read Container $context
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

	/**
	 * @param Template $template
	 */
	protected function registerFilters($template)
	{
		$template->addFilter('timeAgo', function(DateTime $d) {
			return Html::el('time')
				->setText($d->format('j.n.Y H:i'))
				->addAttributes([
					'datetime' => $d->format('c')
				]);
		});
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

	protected function createComponent($name, $args = [])
	{
		$method = 'createComponent' . ucFirst($name);
		if (method_exists($this, $method))
		{
			return $this->$method();
		}
		else if (substr($name, -4) === 'Form')
		{
			$formClass = 'App\\Components\\Forms\\' . ucFirst(substr($name, 0, -4));
			if (class_exists($formClass))
			{
				array_unshift($args, $formClass);
				return $this->buildComponent(FormControl::class, $args);
			}
		}
		else
		{
			$controlClass = 'App\\Components\\Controls\\' . ucFirst($name);
			if (class_exists($controlClass))
			{
				return $this->buildComponent($controlClass, $args);
			}
		}
		return parent::createComponent($name);
	}

	/**
	 * @param string $class
	 * @param array $args
	 * @return Control
	 */
	protected function buildComponent($class, $args = [])
	{
		/** @var Control $this */
		$obj = $this->context->createInstance($class, $args);
		$this->context->callInjects($obj);
		return $obj;
	}

}
