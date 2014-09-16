<?php

namespace App\Models\Services;

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

	const S_COMPLETE = 'complete';
	const S_INNER = 'cdata';
	const S_OPEN = 'open';
	const S_CLOSE = 'close';

	/**
	 * Must also be changed in exercise.less
	 * @see http://www.colourlovers.com/palette/1930/cheer_up_emo_kid
	 */
	const COLOR1 = '78,205,196';
	const COLOR2 = '199,244,100';
	const COLOR3 = '255,107,107';
	const COLOR4 = '85,98,112';

	/**
	 * @var int
	 */
	private $seed;

	/**
	 * @var BlueprintPurifier
	 */
	private $purifier;

	public function __construct(BlueprintPurifier $purifier)
	{
		$this->seed = mt_rand();
		$this->purifier = $purifier;
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
		$vars = [];
		foreach ($blueprint->vars as $var => $def)
		{
			switch ($def->type)
			{
				case 'integer':
					$vars[$var] = rand($def->min, $def->max);
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

		$exercise['vars'] = $vars;
		$exercise['question'] = $this->compileString($blueprint->question, $vars);
		$exercise['answer'] = $this->compileString($blueprint->answer, $vars);
		$exercise['hints'] = [];
		foreach ($blueprint->hints as $i => $hint)
		{
			$exercise['hints'][$i] = $this->compileString($hint, $vars);
		}

		return new Exercise($blueprint, $this->seed, $exercise['question'], $exercise['answer'], $exercise['hints']);
	}

	private function compileString($string, array $vars)
	{
		$nodes = $this->tokenize($string);
		$out = '';
		$inLatex = FALSE;
		$inColor = FALSE;
		foreach ($nodes as $node)
		{
			$out .= $this->compileNode($node, $vars, $inLatex, $inColor);
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

			default:
				throw new NotImplementedException("Unknown tag '$node[tag]''");
		}
	}

	private function getColorOpen($color, $inLatex)
	{
		if (!in_array($color, [1, 2, 3, 4]))
		{
			throw new InvalidArgumentException('Undefined color');
		}

		if ($inLatex)
		{
			$rgb = constant("self::COLOR{$color}");
			return "{\\color[RGB]{{$rgb}}";
		}

		return "<span class=\"color-$color\">";
	}

	private function tokenize($string)
	{
		$values = [];

		$p = xml_parser_create();
		xml_parse_into_struct($p, "<text>$string</text>", $values);
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
		foreach ($vars as $var => $value)
		{
			$eval = preg_replace('~\b' . preg_quote($var, '~') . '\b~', $value, $eval);
		}

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
