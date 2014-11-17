<?php

namespace App\Components;

use App\ImplementationException;
use App\Models\Orm\Entity;
use App\Models\Rme;
use App\Models\Structs\Highlights\Highlight;
use App\NotImplementedException;
use App\Presenters\Presenter;
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
	use LogTrait;


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
		$template->addFilter('hours', function($seconds) {
			return round($seconds / 3600);
		});
		$template->addFilter('minutes', function($seconds) {
			return round($seconds / 60);
		});
	}

	public function link($destination, $args = [])
	{
		if ($destination instanceof Rme\Schema)
		{
			$args = ['schemaId' => $destination->id];
			$destination = 'Schema:';
		}
		else if ($destination instanceof Rme\Block)
		{
			/** @var Rme\Schema $schema */
			$schema = NULL;
			if (isset($args[0]) && $args[0] instanceof Rme\Schema)
			{
				$schema = $args[0];
			}

			$args = [
				'blockId' => $destination->id,
				'schemaId' => $schema ? $schema->id : NULL,
			];
			$destination = 'Block:';
		}
		else if ($destination instanceof Rme\Content)
		{
			/** @var Rme\Block $block */
			$block = NULL;
			if (isset($args[0]) && $args[0] instanceof Rme\Block)
			{
				$block = $args[0];
			}

			/** @var Rme\Schema $schema */
			$schema = NULL;
			if (isset($args[1]) && $args[1] instanceof Rme\Schema)
			{
				$schema = $args[1];
			}

			$id = $destination->id;
			if ($destination instanceof Rme\Video)
			{
				$idKey = 'videoId';
				$destination = 'Video:';
			}
			else if ($destination instanceof Rme\Blueprint)
			{
				$idKey = 'blueprintId';
				$destination = 'Blueprint:';
			}
			else
			{
				throw new NotImplementedException;
			}

			$args = [
				$idKey => $id,
				'blockId' => $block ? $block->id : NULL,
				'schemaId' => $schema ? $schema->id : NULL,
			];
		}

		/** @noinspection PhpDynamicAsStaticMethodCallInspection */
		return NControl::link($destination, $args);
	}

	protected function redirectToEntity(Entity $entity)
	{
		$args = func_get_args();
		$entity = array_shift($args);
		/** @var Presenter $this */
		$this->redirectUrl($this->link($entity, $args));
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

		return Presenter::createComponent($name);
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
