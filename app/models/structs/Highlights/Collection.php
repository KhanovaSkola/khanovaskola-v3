<?php

namespace App\Models\Structs\Highlights;

use App\Models\Orm\Entity;
use Iterator;
use Nette\Object;


class Collection extends Object implements Iterator
{

	private $key = 0;

	/**
	 * @var Highlight[]
	 */
	protected $data;

	public function add(Entity $entity, array $highlights)
	{
		$class = $entity->getHighlightEntityName();
		$this->data[] = new $class($entity, $highlights);
	}

	/**
	 * @return Highlight
	 */
	public function current()
	{
		return $this->data[$this->key];
	}

	public function next()
	{
		$this->key++;
	}

	public function key()
	{
		return $this->key;
	}

	public function valid()
	{
		return isset($this->data[$this->key]);
	}

	public function rewind()
	{
		$this->key = 0;
	}

}
