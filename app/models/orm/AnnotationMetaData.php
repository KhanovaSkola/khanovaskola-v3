<?php

namespace App\Models\Orm;

use Nette\Reflection\AnnotationsParser as NetteAnnotationsParser;
use Orm;
use Orm\AnnotationMetaDataException;
use Orm\AnnotationsParser;
use Orm\Callback;
use Orm\MetaData;
use Orm\MetaDataProperty;
use ReflectionClass;


/**
 * Adds support for FQN classes in property
 */
class AnnotationMetaData extends Orm\AnnotationMetaData
{

	static private $modes = [
		'property' => MetaData::READWRITE,
		'property-read' => MetaData::READ,
		'property-write' => MetaData::WRITE,
	];

	/**
	 * @var AnnotationsParser
	 */
	private $parser;

	/**
	 * @var string
	 */
	private $class;

	/**
	 * Temporary save
	 * @var NULL|array array(string, MetaDataProperty)
	 * @see self::callOnMacro()
	 */
	private $property;

	/**
	 * @param MetaData $metaData
	 * @param AnnotationsParser $parser
	 * @throws AnnotationMetaDataException
	 */
	protected function __construct(MetaData $metaData, AnnotationsParser $parser)
	{
		$this->parser = $parser;
		$this->class = $metaData->getEntityClass();

		foreach ($this->getClasses($this->class) as $class)
		{
			$ref = new ReflectionClass($class);
			foreach ($this->getAnnotation($class) as $annotation => $tmp)
			{
				if (isset(self::$modes[$annotation]))
				{
					foreach ($tmp as $string)
					{
						$this->addProperty($metaData, $string, self::$modes[$annotation], $class, $ref);
					}
					continue;
				}

				if (strncasecmp($annotation, 'prop', 4) === 0)
				{
					$string = current($tmp);
					throw new AnnotationMetaDataException("Invalid annotation format '@$annotation $string' in $class");
				}
			}
		}
	}

	/**
	 * Returns phpdoc annotations.
	 * @param string $class
	 * @return array of annotation => array
	 * @see AnnotationsParser
	 */
	protected function getAnnotation($class)
	{
		return $this->parser->getByReflection(new ReflectionClass($class));
	}

	/**
	 * @param string
	 * @return array
	 */
	private function getClasses($class)
	{
		$classes = [$class];
		while ($class = get_parent_class($class))
		{
			$i = class_implements($class);
			if (!isset($i['Orm\IEntity']))
			{
				break;
			}
			$classes[] = $class;
			if ($class === 'Orm\Entity') // speedup
			{
				break;
			}
		}
		return array_reverse($classes);
	}

	/**
	 * @param MetaData $metaData
	 * @param string $string
	 * @param string $mode ::READWRITE|MetaData::READ|MetaData::WRITE
	 * @param string $class
	 * @param ReflectionClass $r
	 */
	private function addProperty(MetaData $metaData, $string, $mode, $class, ReflectionClass $r)
	{
		if ($mode === MetaData::READWRITE) // bc; drive AnnotationsParser na pomlčce skončil
		{
			if (preg_match('#^(-read|-write)?\s?(.*)$#si', $string, $match))
			{
				$mode = $match[1];
				$mode = ((!$mode OR $mode === '-read') ? MetaData::READ : 0) | ((!$mode OR $mode === '-write') ? MetaData::WRITE : 0);
				$string = $match[2];
			}
		}

		if (preg_match('#^([a-z0-9_\[\]\|\\\\]+)\s+\$([a-z0-9_]+)($|\s(.*)$)#si', $string, $match))
		{
			$property = $match[2];
			$type = $match[1];
			$string = $match[3];
		}
		else if (preg_match('#^\$([a-z0-9_]+)\s+([a-z0-9_\|\\\\]+)($|\s(.*)$)#si', $string, $match))
		{
			$property = $match[1];
			$type = $match[2];
			$string = $match[3];
		}
		else if (preg_match('#^\$([a-z0-9_]+)($|\s(.*)$)#si', $string, $match))
		{
			$property = $match[1];
			$type = 'mixed';
			$string = $match[2];
		}
		else
		{
			$tmp = $mode === MetaData::READ ? '-read' : '';
			throw new AnnotationMetaDataException("Invalid annotation format '@property$tmp $string' in $class");
		}

		if (strpos(strToLower($string), '{ignore}') !== FALSE)
		{
			return;
		}

		$propertyName = $property;

		// Support for simplified FQN '@property Foo' instead of '@property \App\Foo'
		$parts = explode('|', $type);
		foreach ($parts as &$part)
		{
			$fqn = NetteAnnotationsParser::expandClassName($part, $r);
			if (class_exists($fqn))
			{
				$part = $fqn;
			}

			if ($part === Orm\OneToMany::class)
			{
				// Support for '@property OtM|Foo[]' instead of '@property Orm\OneToMany'
				$parts = [Orm\OneToMany::class];
				break;
			}
			else if ($part === Orm\ManyToMany::class)
			{
				// Support for '@property MtM|Foo[]' instead of '@property Orm\ManyToMany'
				$parts = [Orm\ManyToMany::class];
				break;
			}
			else if (substr($part, -2) === '[]')
			{
				$part = 'array';
			}
		}
		$type = implode('|', $parts);

		$property = $metaData->addProperty($propertyName, $type, $mode, $class);
		$this->property = [$propertyName, $property];
		$string = preg_replace_callback('#\{\s*([^\s\}\{]+)(?:\s+([^\}\{]*))?\s*\}#si', [$this, 'callOnMacro'], $string);
		$this->property = NULL;

		if (preg_match('#\{|\}#', $string))
		{
			$string = trim($string);
			throw new AnnotationMetaDataException("Invalid annotation format, extra curly bracket '$string' in $class::\$$propertyName");
		}
	}

	/**
	 * callback
	 * Vola metodu na property. To je cokoli v kudrnatých závorkách.
	 * @param array
	 * @see MetaDataProperty::$property
	 */
	private function callOnMacro($match)
	{
		/** @var MetaDataProperty $property */
		list($propertyName, $property) = $this->property;

		$name = strtolower($match[1]);
		if (isset(static::$aliases[$name])) $name = static::$aliases[$name];
		$method = "set{$name}";
		if (!method_exists($property, $method))
		{
			$class = $property->getSince();
			throw new AnnotationMetaDataException("Unknown annotation macro '{{$match[1]}}' in $class::\$$propertyName");
		}
		$params = isset($match[2]) ? $match[2] : NULL;
		$paramMethod = "builtParams{$name}";
		if (method_exists($this, $paramMethod))
		{
			$params = $this->$paramMethod($params);
		}
		else
		{
			$params = [$params];
		}
		call_user_func_array([$property, $method], $params);
	}

	/**
	 * <code>
	 * repositoryName paramName
	 * </code>
	 *
	 * @param string
	 * @return array
	 * @see MetaDataProperty::setOneToOne()
	 */
	public function builtParamsOneToOne($string)
	{
		return $this->builtParamsOneToMany($string);
	}

	/**
	 * <code>
	 * repositoryName paramName
	 * </code>
	 *
	 * @param string
	 * @return array
	 * @see MetaDataProperty::setManyToOne()
	 */
	public function builtParamsManyToOne($string)
	{
		return $this->builtParamsOneToMany($string);
	}

	/**
	 * <code>
	 * repositoryName paramName
	 * </code>
	 *
	 * @param string
	 * @param int $slice
	 * @return array
	 * @see MetaDataProperty::setOneToMany()
	 */
	public function builtParamsOneToMany($string, $slice = 2)
	{
		$string = preg_replace('#\s+#', ' ', trim($string));
		$arr = array_slice(array_filter(array_map('trim', explode(' ', $string, 3))), 0, $slice) + [NULL, NULL];
		if ($arr[1])
		{
			$arr[1] = ltrim($arr[1], '$');
		}
		return $arr;
	}

	/**
	 * <code>
	 * repositoryName paramName
	 * repositoryName paramName mappedByThis
	 * repositoryName paramName map
	 * </code>
	 *
	 * @param string
	 * @return array
	 * @see MetaDataProperty::setManyToMany()
	 */
	public function builtParamsManyToMany($string)
	{
		$arr = $this->builtParamsOneToMany($string, 3);
		if (isset($arr[2]) AND stripos($arr[2], 'map') !== FALSE)
		{
			$arr[2] = TRUE;
		}
		else
		{
			$arr[2] = NULL;
		}
		return $arr;
	}

	/**
	 * Upraví vstupní parametry pro enum, když jsou zadány jako string (např. v annotation)
	 * Vytvoří pole z hodnot rozdělených čárkou, umožňuje zápis konstant.
	 * Nebo umožňuje zavolat statickou třídu, která vrátí pole hodnot (použijí se klice)
	 *
	 * <code>
	 * 1, 2, 3
	 * bla1, 'bla2', "bla3"
	 * TRUE, false, NULL, self::CONSTANT, Foo::CONSTANT
	 * self::getValuesHere()
	 * </code>
	 *
	 * @param string
	 * @return array
	 * @see MetaDataProperty::setEnum()
	 */
	public function builtParamsEnum($string)
	{
		if (preg_match('#^([a-z0-9_\\\\]+::[a-z0-9_]+)\(\)$#si', trim($string), $tmp))
		{
			/** @var Callback $tmp */
			$tmp = Callback::create($this->parseSelf($tmp[1]));
			$enum = $tmp->invoke();
			if (!is_array($enum)) throw new AnnotationMetaDataException("'{$this->class}' '{enum {$string}}': callback must return array, " . (is_object($enum) ? get_class($enum) : gettype($enum)) . ' given');
			$original = $enum = array_keys($enum);
		}
		else
		{
			$original = $enum = [];
			foreach (explode(',', $string) as $d)
			{
				$d = $this->parseSelf($d);
				$value = $this->parseString($d, "{enum {$string}}");
				$enum[] = $value;
				$original[] = $d;
			}
		}
		return [$enum, implode(', ', $original)];
	}

	/**
	 * Upraví vstupní parametry pro default, když jsou zadány jako string (např. v annotation)
	 * Umožňuje zapsat konstantu.
	 *
	 * <code>
	 * 568
	 * bla1
	 * TRUE
	 * self::CONSTANT
	 * Foo::CONSTANT
	 * </code>
	 *
	 * @param string
	 * @return array
	 * @see MetaDataProperty::setDefault()
	 */
	public function builtParamsDefault($string)
	{
		$string = $this->parseSelf($string);
		$string = $this->parseString($string, "{default {$string}}");
		return [$string];
	}

	/**
	 * Umožňuje zápis self::method()
	 * @param mixed
	 * @return mixed
	 * @see MetaDataProperty::setInjection()
	 */
	public function builtParamsInjection($string)
	{
		return [rtrim($this->parseSelf($string), '()')];
	}

	/**
	 * Nahradí self:: za název entity
	 * @param string
	 * @return string
	 * @see self::builtParamsEnum()
	 * @see self::builtParamsDefault()
	 * @see self::builtParamsInjection()
	 */
	protected function parseSelf($string)
	{
		$string = trim($string);
		if (substr($string, 0, 6) === 'self::')
		{
			$string = str_replace('self::', "{$this->class}::", $string);
		}
		return $string;
	}

	/**
	 * @param string
	 * @param string
	 * @return string|float|int|boolean
	 * @see self::builtParamsEnum()
	 * @see self::builtParamsDefault()
	 */
	protected function parseString($value, $errorMessage)
	{
		if (is_numeric($value))
		{
			$value = (float) $value;
			$intValue = (int) $value;
			if ($intValue == $value)
			{
				$value = $intValue;
			}
		}
		else if (defined($value))
		{
			$value = constant($value);
		}
		else if (strpos($value, '::') !== FALSE)
		{
			throw new AnnotationMetaDataException("'{$this->class}' '$errorMessage': Constant $value not exists");
		}
		else
		{
			$value = trim($value, '\'"');
		}
		return $value;
	}

}
