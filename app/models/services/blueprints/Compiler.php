<?php

namespace App\Models\Services\Blueprints;

use App\BlueprintCompilerException;
use App\InvalidArgumentException;
use App\Models\Rme\Blueprint;
use App\Models\Rme\BlueprintPartial;
use App\Models\Services\BlueprintPurifier;
use App\Models\Services\Inflection;
use App\Models\Structs\Exercises\ScalarExercise;
use App\NotImplementedException;
use KhanovaSkola\Cislo;
use Nette\Object;
use Symfony\Component\Process\Process;


class Compiler extends Object
{

	const T_TEXT = 'TEXT';
	const T_COLOR = 'COLOR';
	const T_LATEX = 'LATEX';
	const T_EVAL = 'EVAL';
	const T_INFLECT = 'INFLECT';
	const T_IMG = 'IMG';
	const T_NUMBER = 'NUMBER';

	const S_COMPLETE = 'complete';
	const S_INNER = 'cdata';
	const S_OPEN = 'open';
	const S_CLOSE = 'close';

	/**
	 * Must also be changed in less
	 */
	const COLOR1 = '113,189,26'; // khan-green
	const COLOR2 = '208,70,19'; // khan-red
	const COLOR3 = '84,207,203'; // khan-cyan-dark
	const COLOR4 = '236,148,5'; // khan-gold

	/**
	 * @var int
	 */
	private $seed;

	/**
	 * @var BlueprintPurifier
	 */
	private $purifier;

	/**
	 * @var int
	 */
	private $bufferLevel = 0;

	/**
	 * @var string[]
	 */
	private $buffers;

	/**
	 * @var array
	 */
	private $bufferData;

	/**
	 * @var Inflection
	 */
	private $inflection;

	/**
	 * @var string
	 */
	private $errorContext;

	public function __construct(BlueprintPurifier $purifier, Inflection $inflection)
	{
		$this->seed = mt_rand();
		$this->purifier = $purifier;
		$this->inflection = $inflection;
	}

	public function reseed($seed = NULL)
	{
		if ($seed)
		{
			$this->setSeed($seed);
		}
		else
		{
			$this->setSeed(mt_rand());
		}
	}

	public function setSeed($seed)
	{
		$this->seed = $seed;
	}

	/**
	 * @param Blueprint $blueprint
	 * @return ScalarExercise
	 * @throws \Exception
	 */
	public function compile(Blueprint $blueprint)
	{
		srand($this->seed);

		$vars = $this->compileVars($blueprint->vars);
		$partial = $this->pickPartial($blueprint);

		$partialCompiler = $this->createPartialCompiler($partial, $vars);
		return $partialCompiler->compilePartial($partial);
	}

	/**
	 * @param BlueprintPartial $partial
	 * @param array $vars
	 * @return ScalarCompiler
	 */
	private function createPartialCompiler(BlueprintPartial $partial, array $vars)
	{
		$class = 'App\\Models\\Services\\Blueprints\\' . ucFirst($partial->answerType) . 'Compiler';
		return new $class($this, $vars);
	}

	/**
	 * @param Blueprint $blueprint
	 * @return BlueprintPartial
	 */
	protected function pickPartial(Blueprint $blueprint)
	{
		$partials = $blueprint->partials->get()->fetchAll();
		return $partials[rand(0, count($partials) - 1)];
	}

	protected function compileVars(array $blueprintVars)
	{
		$vars = [];
		foreach ($blueprintVars as $var => $def)
		{
			switch ($def->type)
			{
				case 'table':
					$line = rand(1, count($def->data) - 1); // row 0 is var names
					// TODO validate the data
					foreach ($def->data[0] as $i => $var)
					{
						$vars[$var] = $def->data[$line][$i];
					}
					break;
				case 'integer':
					$min = $this->compileString($def->min, $vars);
					$max = $this->compileString($def->max, $vars);
					$vars[$var] = rand(ctype_digit($min) ? $min : 0, ctype_digit($max) ? $max : 0);
					break;
				case 'list':
					$vars[$var] = $def->list[rand(0, count($def->list) - 1)];
					break;
				case 'plural':
					$val = abs($this->compileString($def->count, $vars));
					$vars[$var] = $val === 1 ? $def->one : ($val >= 2 && $val <= 4 ? $def->few : $def->many);
					break;
				default:
					throw new NotImplementedException;
			}
		}

		return $vars;
	}

	public function compileString($string, array $vars)
	{
		$this->errorContext = $string;

		$nodes = $this->tokenize($string);
		$out = '';
		$inLatex = FALSE;
		$inColor = FALSE;
		foreach ($nodes as $node)
		{
			$partial = $this->compileNode($node, $vars, $inLatex, $inColor);
			if ($this->bufferLevel)
			{
				@$this->buffers[$this->bufferLevel] .= $partial; // default to empty string
			}
			else
			{
				$out .= $partial;
			}
		}

		$out = preg_replace('~\n{2,}~', '<br>', $out);
		return $this->purifier->filter($out);
	}

	/**
	 * @param array $node
	 * @param array $vars
	 * @param $inLatex
	 * @param $inColor
	 * @return string
	 */
	private function compileNode(array $node, array $vars, &$inLatex, &$inColor)
	{
		switch ($node['tag'])
		{
			case self::T_TEXT:
				return isset($node['value']) ? $node['value'] : '';

			case self::T_EVAL:
				if ($node['type'] !== self::S_COMPLETE)
				{
					throw new InvalidArgumentException;
				}
				return $this->evaluate($node['value'], $vars);

			case self::T_LATEX:
				if ($node['type'] === self::S_OPEN)
				{
					$inLatex = TRUE;
					$out = '$';
					if ($inColor)
					{
						$open = $this->getColorOpen($inColor, TRUE);
						$out = "</span>\${$open}";
					}
					return $out . (isset($node['value']) ? $node['value'] : '');
				}
				else if ($node['type'] === self::S_CLOSE)
				{
					$inLatex = FALSE;
					if ($inColor)
					{
						$open = $this->getColorOpen($inColor, FALSE);
						return "}\${$open}";
					}
					return '$';
				}
				else if ($node['type'] === self::S_INNER)
				{
					return $node['value'];
				}
				else // self::S_COMPLETE
				{
					if ($inColor)
					{
						$openLatex = $this->getColorOpen($inColor, TRUE);
						$openText = $this->getColorOpen($inColor, FALSE);
						return "</span>\$$openLatex{$node['value']}}\${$openText}";
					}
					return '$' . $node['value'] . '$';
				}

			case self::T_COLOR:
				$color = $inColor ?: $node['attributes']['ID'];
				$open = $this->getColorOpen($color, $inLatex);
				$close = $inLatex ? '}' : '</span>';
				if ($node['type'] === self::S_COMPLETE)
				{
					return $open . $node['value'] . $close;
				}
				else if ($node['type'] === self::S_OPEN)
				{
					$inColor = $color;
					return $open . (isset($node['value']) ? $node['value'] : '');
				}
				else if ($node['type'] === self::S_INNER)
				{
					return $node['value'];
				}
				else // self::S_CLOSE
				{
					$inColor = FALSE;
					return $close;
				}

			case self::T_INFLECT:
				if ($node['type'] === self::S_COMPLETE)
				{
					return $this->inflection->inflect($node['value'], $node['attributes']['CASE']);
				}
				else if ($node['type'] === self::S_OPEN)
				{
					$this->bufferLevel++;
					$this->bufferData[$this->bufferLevel] = $node['attributes']['CASE'];
					return '';
				}
				else if ($node['type'] === self::S_INNER)
				{
					return $node['value'];
				}
				else // self::S_CLOSE
				{
					$buffer = $this->buffers[$this->bufferLevel];
					$case = $this->bufferData[$this->bufferLevel];
					$out = $this->inflection->inflect($buffer, $case);

					$this->bufferLevel--;
					array_pop($this->buffers);
					return $out;
				}

			case self::T_IMG:
				if ($node['type'] !== self::S_COMPLETE)
				{
					throw new BlueprintCompilerException('Invalid image syntax');
				}
				$url = isset($node['attributes']['SRC'])
					? $node['attributes']['SRC']
					: $this->evaluate($node['attributes']['EVALSRC'], $vars);

				if (strpos($url, 'http://') !== FALSE)
				{
					throw new BlueprintCompilerException("Invalid image source '$url', http not allowed.");
				}
				if (strpos($url, 'https://') === FALSE)
				{
					$url = "/data/exercise/$url";
				}

				$count = $this->evaluate($node['attributes']['COUNT'], $vars);
				$size = isset($node['attributes']['SIZE']) ? $node['attributes']['SIZE'] : 48;
				return str_repeat("<img src=\"$url\" height=\"$size\" />", max(0, $count));

			case self::T_NUMBER:
				if ($node['type'] === self::S_COMPLETE)
				{
					return Cislo::toWord($node['value']);
				}
				else if ($node['type'] === self::S_OPEN)
				{
					$this->bufferLevel++;
					return '';
				}
				else if ($node['type'] === self::S_INNER)
				{
					return $node['value'];
				}
				else // self::S_CLOSE
				{
					$buffer = $this->buffers[$this->bufferLevel];
					$out = Cislo::toWord($buffer);

					$this->bufferLevel--;
					array_pop($this->buffers);
					return $out;
				}

			default:
				throw new NotImplementedException("Unknown tag '$node[tag]' in '$this->errorContext'");
		}
	}

	private function getColorOpen($color, $inLatex)
	{
		if (!in_array($color, [1, 2, 3, 4]))
		{
			throw new BlueprintCompilerException("Color $color not found, must use [1,2,3,4]");
		}

		if ($inLatex)
		{
			$rgb = constant("self::COLOR{$color}");
			return '{\\color[RGB]{' . $rgb . '}';
		}

		return "<span class=\"exercise-color-$color\">";
	}

	/**
	 * @param string $string xml
	 * @throws BlueprintCompilerException
	 * @return array
	 */
	private function tokenize($string)
	{
		$values = [];

		$p = xml_parser_create();
		$res = xml_parse_into_struct($p, "<text>$string</text>", $values);
		if (!$res)
		{
			$col = xml_get_current_column_number($p);
			$line = xml_get_current_line_number($p);
			$msg = xml_error_string(xml_get_error_code($p));

			$contextLine = explode("\n", $string)[$line - 1];
			$atError = substr($contextLine, $col, 15);
			$context = substr($contextLine, max(0, $col - 15), 25);

			throw new BlueprintCompilerException("Invalid XML: '$atError', $msg ($line:$col) context: '$context''");
		}

		xml_parser_free($p);

		return $values;
	}

	/**
	 * @param string $eval
	 * @param array $vars
	 * @return string
	 */
	private function evaluate($eval, array $vars)
	{
		$original = $eval;
		$eval = preg_replace_callback('~\b\w+\b~', function($match) use ($original, $vars) {
			$var = $match[0];

			if (ctype_digit($var))
			{
				// scalar
				return $var;
			}

			if (!isset($vars[$var]))
			{
				throw new BlueprintCompilerException("Undefined variable '$var' in '$this->errorContext'.");
			}
			return $vars[$var];
		}, $eval);

		if (preg_match('~^[0-9.+/*^()\s-]+$~', $eval))
		{
			return $this->evaluateMath($eval);
		}
		return $eval;
	}

	/**
	 * @param string $eval
	 * @return float
	 */
	private function evaluateMath($eval)
	{
		$process = new Process(sprintf('echo %s | bc', escapeshellarg($eval)));
		$process->setTimeout(1);
		$process->run();
		return (float) trim($process->getOutput());
	}

	/**
	 * @return int
	 */
	public function getSeed()
	{
		return $this->seed;
	}

	protected function onCompile()
	{
	}

}
