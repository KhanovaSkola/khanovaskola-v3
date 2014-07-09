<?php

namespace App\Models\Structs\VideoEvents;

use JsonSerializable;
use Nette\Object;
use Nette\Reflection\Property;


abstract class Event extends Object implements JsonSerializable
{

	/**
	 * @var float seconds
	 */
	public $timeAt;

	public function jsonSerialize()
	{
		$values = [];
		foreach ($this->reflection->getProperties(Property::IS_PUBLIC) as $prop)
		{
			$values[$prop->name] = $this->{$prop->name};
		}
		$values['_class'] = get_class($this);

		return $values;
	}

}
