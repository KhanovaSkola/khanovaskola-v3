<?php

namespace App\Components\Controls;

use App\Models\Orm\RepositoryContainer;
use Nette\Forms;
use Nette\Utils\Html;


class EditorSelector extends Forms\Controls\MultiSelectBox
{

	/**
	 * @var RepositoryContainer
	 */
	protected $orm;

	/**
	 * @var bool
	 */
	private $editable;

	/**
	 * @param RepositoryContainer $orm
	 * @param NULL|bool $editable
	 */
	public function __construct(RepositoryContainer $orm, $editable = FALSE)
	{
		$this->orm = $orm;

		$users = $this->orm->users->findRegistered()->fetchPairs('id', 'email');
		parent::__construct(NULL, $users);

		$this->setTranslator(NULL);
		$this->editable = $editable;
	}

	public static function register()
	{
		Forms\Container::extensionMethod('addEditorSelector', [self::class, 'addEditorSelector']);
	}

	/**
	 * @param Forms\Container $container
	 * @param string $name
	 * @param RepositoryContainer $orm
	 * @param NULL|bool $editable
	 */
	public static function addEditorSelector(Forms\Container $container, $name, RepositoryContainer $orm, $editable = FALSE)
	{
		$container->addComponent(new self($orm, $editable), $name);
	}


	/**
	 * @return \Nette\Utils\Html
	 */
	public function getControl()
	{
		if ($this->editable)
		{
			return parent::getControl();
		}

		$labels = [];
		foreach ($this->getValue() as $id)
		{
			$labels[] = $this->getItems()[$id];
		}

		return Html::el('div')->setText(implode(', ', $labels) ?: 'nikdo');
	}

	/**
	 * @return boolean
	 */
	public function isEditable()
	{
		return $this->editable;
	}

	/**
	 * @param boolean $editable
	 */
	public function setEditable($editable)
	{
		$this->editable = $editable;
	}

}
