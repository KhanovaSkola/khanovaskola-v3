<?php

namespace App\Models\Structs\Highlights;

use App\Models\Orm\Entity;
use Countable;
use Iterator;
use Nette\Object;


class Collection extends Object implements Iterator, Countable
{

	private $key = 0;

	/**
	 * @var Highlight[]
	 */
	protected $data;

	public function add(Entity $entity, array $highlights, $score)
	{
		$class = $entity->getHighlightEntityName();

		/** @var Highlight $hl */
		$hl = new $class($entity, $highlights);
		$hl->setScore($score);
		$this->data[] = $hl;
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

	/**
	 * @return int
	 */
	public function count()
	{
		return count($this->data);
	}

}
