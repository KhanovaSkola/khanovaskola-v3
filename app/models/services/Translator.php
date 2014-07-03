<?php

namespace App\Models\Services;

use App\FileNotFoundException;
use App\InvalidArgumentException;
use App\InvalidStateException;
use App\Rme\User;
use Monolog\Logger;
use Nette;
use Nette\Neon\Neon;


class Translator implements Nette\Localization\ITranslator
{

	const GENDER = 'gender';

	/** @var string */
	private $language;

	/** @var string path */
	private $dir;

	/** @var array */
	private $source;

	/** @var Logger */
	private $log;

	/** @var string */
	private $prefix;

	public function __construct($dir, Logger $log)
	{
		$this->dir = $dir;
		$this->log = $log;
	}

	public function setLanguage($language)
	{
		$this->language = $language;

		$this->source = $this->getSource("$this->dir/$language.yml", $language);
	}

	public function setPrefix($prefix)
	{
		$this->prefix = $prefix;
	}

	protected function getSource($file, $language)
	{
		if (!file_exists($file))
		{
			throw new FileNotFoundException("Localization file for '$language' not found at '$file'");
		}
		$raw = file_get_contents($file);
		return Neon::decode($raw);
	}

	/**
	 * @param int $count
	 * @return array of possible keys, ordered by priority
	 */
	private function countToKey($count)
	{
		$count = abs($count);
		if ($count === 0)
		{
			return ['zero', 'many'];
		}
		else if ($count === 1)
		{
			return ['one'];
		}
		else if ($count >= 2 && $count <= 4)
		{
			return ['few', 'many'];
		}
		else
		{
			return ['many'];
		}
	}

	private function fallback($steps, $count)
	{
		if ($count !== NULL)
		{
			$keys = implode('|', $this->countToKey($count));

			return "[$steps ($keys)]";
		}

		return "[$steps]";
	}

	/**
	 * Translates the given string.
	 *
	 * @param string $steps
	 * @param int $count
	 * @param array $args
	 * @throws \App\InvalidStateException
	 * @throws \App\InvalidArgumentException
	 * @return string
	 */
	public function translate($steps, $count = NULL, array $args = [])
	{
		// alias for translate($steps, $args)
		if (is_array($count) && !$args)
		{
			$args = $count;
			$count = NULL;
		}

		if (strpos($steps, ' ') !== FALSE)
		{
			throw new InvalidArgumentException("Translator expects key such as 'homepage.flash.error', not an actual message.");
		}

		if ($this->language === NULL)
		{
			throw new InvalidStateException('Translator language not set');
		}

		$steps = $this->prefix . $steps;
		$text = $this->findTextByKey($steps, $count);
		if ($text === NULL)
		{
			return $this->fallback($steps, $count);
		}

		$values = $args;
		$values[1] = $count;
		$translated = preg_replace_callback('~%([\w\d]+)~', function ($match) use ($values, $steps)
		{
			$key = $match[1];
			if (!isset($values[$key]))
			{
				$count = count($values);
				$this->log->addNotice("Translation for '$steps' has placeholder for '$match[0]' but arg count is $count", [$this->language]);
				return $match[0];
			}

			return $values[$key];
		}, $text);

		if (isset($values[self::GENDER]))
		{
			// inflect by gender from '[he|she]' syntax
			$isMale = $values[self::GENDER] === User::GENDER_MALE;
			$translated = preg_replace_callback('~\[([^|]*)\|([^|]*)\]~', function($m) use ($isMale) {
				return $isMale ? $m[1] : $m[2];
			}, $translated);
		}

		return $translated;
	}

	protected function findTextByKey($steps, $count)
	{
		$node = $this->source;
		foreach (explode('.', $steps) as $step)
		{
			if (!isset($node[$step]))
			{
				$this->log->addWarning("Translation for '$steps' not found, missing key '$step'", [$this->language]);

				return NULL;
			}
			$node = $node[$step];
		}

		if (!is_array($node))
		{
			if ($count !== NULL)
			{
				$this->log->addNotice("Translation for '$steps' has no plurals, but count '$count' was passed", [$this->language]);
			}

			return $node;
		}

		if ($count === NULL)
		{
			$this->log->addNotice("Translation for '$steps' has plurals, but no count was passed", [$this->language]);
		}

		$keys = $this->countToKey($count);
		foreach ($keys as $key)
		{
			if (isset($node[$key]))
			{
				return $node[$key];
			}
		}
		$this->log->addWarning("Translation for '$steps' is missing plurals", [$this->language]);

		return NULL;
	}

}