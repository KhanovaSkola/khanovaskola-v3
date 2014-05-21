<?php

namespace App\Orm;

use Orm\Inflector;
use Orm\MemberAccessException;
use ReflectionClass;


/**
 * Dynamic static constant getter
 *
 * <code>
 * class Foo
 * {
 *     use ConstantGetter;
 *
 *     const TYPE_A = 'valA';
 *     const TYPE_B = 'valB';
 * }
 *
 * Foo::getTypes() === ['a' => 'valA', 'b' => 'valB'];
 * </code>
 */
trait ConstantGetterTrait
{

	public static function __callStatic($name, $args)
	{
		$class = get_called_class();
		if (strpos($name, 'get') !== 0)
		{
			throw new MemberAccessException("Call to undefined static method $class::$name().");
		}

		$type = Inflector::singularize(substr($name, strlen('get')));
		$prefix = strToLower($type) . '_';

		$return = [];
		$ref = new ReflectionClass($class);
		foreach ($ref->getConstants() as $name => $value)
		{
			$name = strToLower($name);
			if (strpos($name, $prefix) === 0)
			{
				$key = substr($name, strlen($prefix));
				$return[$key] = $value;
			}
		}

		return $return;
	}

}
