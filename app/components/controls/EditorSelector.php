<?php

namespace App\Components\Controls;

use App\Models\Orm\Entity;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use Latte\Engine;
use Nette\Forms;


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
	 * @var Entity
	 */
	private $entity;

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
	 * @throws \Exception
	 * @return string|\Nette\Utils\Html
	 */
	public function getControl()
	{
		$latte = new Engine();
		$params = [
			'editable' => $this->editable,
			'input' => parent::getControl(),
			'emails' => $this->getItems(),
			'picked' => $this->getValue(),
//			'editors' => $this->getParentEditors($this->entity),
			'entity' => $this->entity,
		];
		return $latte->renderToString(__DIR__ . '/../../templates/controls/editorSelector.latte', $params);
//
//		if ($this->editable)
//		{
//			return parent::getControl();
//		}
//
//		$labels = [];
//		foreach ($this->getValue() as $id)
//		{
//			$labels[] = $this->getItems()[$id];
//		}
//
//		return Html::el('div')->setText(implode(', ', $labels) ?: 'nikdo');
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

	/**
	 * @param Entity $entity
	 */
	public function setEntity($entity)
	{
		$this->entity = $entity;
	}

	private function getParentEditors(Entity $entity)
	{
		$editors = [];
		if ($entity instanceof Rme\Block)
		{
			$schemaEditors = [];
			$subjectEditors = [];
			foreach ($entity->schemas as $schema)
			{
				$schemaEditors += $schema->editors->get()->fetchPairs('id', 'id');

				$authorId = (string) $schema->author->id;
				$schemaEditors[$authorId] = $authorId;
			}

			$editors['schemas'] = $schemaEditors;
		}
		else if ($entity instanceof Rme\Schema)
		{
			$editors['subjects'] = $entity->subject->editors->get()->fetchPairs('id', 'id');
		}

		return $editors;
	}

}
