<?php

namespace App\Models\Services;

use App\BlueprintCompilerException;
use App\InvalidArgumentException;
use App\Models\Rme\Blueprint;
use App\Models\Structs\Exercise;
use App\NotImplementedException;
use Nette\Object;
use Symfony\Component\Process\Process;


class BlueprintCompiler extends Object
{

	const T_TEXT = 'TEXT';
	const T_COLOR = 'COLOR';
	const T_LATEX = 'LATEX';
	const T_EVAL = 'EVAL';
	const T_INFLECT = 'INFLECT';

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
	 * @var FALSE|mixed
	 */
	private $inInflection;

	/**
	 * @var string
	 */
	private $inflectBuffer;

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

	public function setSeed($seed)
	{
		$this->seed = $seed;
	}

	/**
	 * @param Blueprint $blueprint
	 * @return Exercise
	 * @throws \Exception
	 */
	public function compile(Blueprint $blueprint)
	{
		srand($this->seed);

		$exercise = [];
		$vars = $this->compileVars($blueprint->vars);

		$partials = $blueprint->partials->get()->fetchAll();
		$partial = $partials[rand(0, count($partials) - 1)];

		$exercise['vars'] = $vars;
		$exercise['question'] = $this->compileString($partial->question, $vars);
		$exercise['answer'] = $this->compileString($partial->answer, $vars);
		$exercise['hints'] = [];
		foreach ($partial->hints as $i => $hint)
		{
			$exercise['hints'][$i] = $this->compileString($hint, $vars);
		}

		return new Exercise($blueprint, $this->seed, $exercise['question'], $exercise['answer'], $exercise['hints']);
	}

	private function compileVars(array $blueprintVars)
	{
		$vars = [];
		foreach ($blueprintVars as $var => $def)
		{
			switch ($def->type)
			{
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

	private function compileString($string, array $vars)
	{
		$this->errorContext = $string;

		$nodes = $this->tokenize($string);
		$out = '';
		$inLatex = FALSE;
		$inColor = FALSE;
		foreach ($nodes as $node)
		{
			$partial = $this->compileNode($node, $vars, $inLatex, $inColor);
			if ($this->inInflection)
			{
				$this->inflectBuffer .= $partial;
			}
			else
			{
				$out .= $partial;
			}
		}

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
					$this->inInflection = $node['attributes']['CASE'];
					return '';
				}
				else if ($node['type'] === self::S_INNER)
				{
					return $node['value'];
				}
				else // self::S_CLOSE
				{
					$out = $this->inflection->inflect($this->inflectBuffer, $this->inInflection);
					$this->inInflection = FALSE;
					$this->inflectBuffer = '';
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

}
