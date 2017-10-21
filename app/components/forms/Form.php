<?php

namespace App\Components\Forms;

use App\Components\Controls\EditorSelector;
use App\Components\LogTrait;
use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Translator;
use App\Presenters\Presenter;
use Kdyby\Replicator\Container;
use Nette;
use Nette\Application\UI\Form as NForm;


/**
 * Differences to NForm
 * - addSubmit name is optional
 *
 * @property-read Presenter $presenter
 * @property-read Translator $translator
 * @method Container addDynamic(string $name, callable $cb)
 * @method EditorSelector addEditorSelector(string $name, RepositoryContainer $orm, bool $editable = FALSE)
 */
abstract class Form extends NForm
{

	use LogTrait;

	public function __construct()
	{
		parent::__construct();

		$this->onSuccess[] = [$this, 'onSuccess'];
	}

	abstract public function setup();

	abstract public function onSuccess();

	/**
	 * @param NULL|string $name
	 * @param NULL|string $caption
	 * @return \Nette\Forms\Controls\SubmitButton
	 */
	public function addSubmit($name = NULL, $caption = NULL)
	{
		return parent::addSubmit($name ?: 'save', $caption);
	}

}
