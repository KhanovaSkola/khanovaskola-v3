<?php


namespace App\Services;

use App\FileNotFoundException;
use App\InvalidStateException;
use Monolog\Logger;
use Nette;


class Translator implements Nette\Localization\ITranslator
{

	/** @var string */
	private $language;

	/** @var string path */
	private $dir;

	/** @var array */
	private $source;

	/** @var Logger */
	private $log;

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

	protected function getSource($file, $language)
	{
		if (!file_exists($file))
		{
			throw new FileNotFoundException("Localization file for '$language' not found at '$file'");
		}
		$raw = file_get_contents($file);
		return Nette\Utils\Neon::decode($raw);
	}

	/**
	 * @param $count
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
	 * @return string
	 */
	public function translate($steps, $count = NULL)
	{
		if ($this->language === NULL)
		{
			throw new InvalidStateException('Translator language not set');
		}

		$text = $this->findTextByKey($steps, $count);
		if ($text === NULL)
		{
			return $this->fallback($steps, $count);
		}

		$values = array_slice(func_get_args(), 1);
		return preg_replace_callback('~%(\d+)~', function ($match) use ($values, $steps)
		{
			$key = $match[1] - 1;
			if (!isset($values[$key]))
			{
				$count = count($values);
				$this->log->addNotice("Translation for '$steps' has placeholder for '$match[0]' but arg count is $count", [$this->language]);
				return $match[0];
			}

			return $values[$key];
		}, $text);
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
