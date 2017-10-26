<?php

namespace App\Components\Controls;

use App\Models\Orm\Entity;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use Latte\Engine;
use Nette\Forms;


class EditorSelector extends Forms\Controls\TextInput
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

		parent::__construct(NULL);

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
			'control' => $this,
			'input' => parent::getControl(),
			'editors' => $this->getValue(),
			'entity' => $this->entity,
			'cascaded' => $this->getCascadedAllows(),
		];
		return $latte->renderToString(__DIR__ . '/../../templates/controls/editorSelector.latte', $params);
	}

	public function getValue()
	{
		$emails = preg_split('~\s*,\s*~', parent::getValue());
		$res = [];
		foreach ($emails as $email)
		{
			$user = $this->orm->users->getByEmail($email);
			if ($user)
			{
				$res[$user->id] = $user;
			}
		}
		return $res;
	}

	public function validate()
	{
		if ($this->isDisabled())
		{
			return;
		}

		$this->cleanErrors();
		$this->getRules()->validate();

		$emails = preg_split('~\s*,\s*~', parent::getValue());
		foreach ($emails as $email)
		{
			$email = trim($email);
			if (!$email)
			{
				continue;
			}

			$user = $this->orm->users->getByEmail($email);
			if (!$user)
			{
				$this->addError("Email '$email' not registered.");
			}
		}
	}

	public function setValue($editors)
	{
		$emails = [];
		if (is_array($editors))
		{
			foreach ($editors as $editor)
			{
                           // DH: The if is a hack to prevent warning:
                           // "Trying to get property of non-object"
                           if(is_object($editor)) {
				$emails[] = $editor->email;
                           }
			}
			$editors = implode(', ', $emails);
		}

		return parent::setValue($editors);
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

	/**
	 * @return array [reasons, entities]
	 */
	public function getCascadedAllows()
	{
		$subjects = [];
		$allowed = [];
		$entities = [];

		if ($this->entity instanceof Rme\Schema && $this->entity->subject)
		{
			$subjects[$this->entity->subject->id] = $this->entity->subject;
		}

		if ($this->entity instanceof Rme\Block)
		{
			foreach ($this->entity->schemas as $schema)
			{
				if ($schema->subject)
				{
					$subjects[$schema->subject->id] = $schema->subject;
				}

				foreach ($schema->editors as $editor)
				{
					$allowed[$editor->id][] = "schéma $schema->title";
					$entities[$editor->id] = $editor;
				}

				$allowed[$schema->author->id][] = "autor schématu {$schema->title}";
				$entities[$schema->author->id] = $schema->author;
			}
		}

		foreach ($subjects as $subject)
		{
			foreach ($subject->editors as $editor)
			{
				$allowed[$editor->id][] = "předmět $subject->title";
				$entities[$editor->id] = $editor;
			}
		}

		return (object) [
			'allowed' => $allowed,
			'entities' => $entities
		];
	}

}
