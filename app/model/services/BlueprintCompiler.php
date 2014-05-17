<?php

namespace App\Services;

use App\MustNeverHappenException;
use App\NotImplementedException;
use App\Rme\Blueprint;
use App\Rme\Exercise;
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

	/** @var int */
	private $seed;

	/** @var BlueprintPurifier */
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
		foreach ($blueprint->vars as $var => $options)
		{
			$type = array_shift($options);
			switch ($type)
			{
				case 'integer':
					list($min, $max) = $options;
					$vars[$var] = rand($min, $max);
					break;
				case 'list':
					$list = $options[0];
					$vars[$var] = $list[rand(0, count($list) - 1)];
					break;
				case 'plural':
					list($val, $one, $few, $many) = $options;
					$val = abs($this->compileString($val, $vars));
					$vars[$var] = $val === 1 ? $one : ($val >= 2 && $val <= 4 ? $few : $many);
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

	private function compileNode(array $node, array $vars, &$inLatex, &$inColor)
	{
		switch ($node['tag'])
		{
			case self::T_TEXT:
				return isset($node['value']) ? $node['value'] : '';

			case self::T_EVAL:
				if ($node['type'] !== self::S_COMPLETE)
				{
					throw new MustNeverHappenException;
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
				throw new NotImplementedException("Unkown tag '$node[tag]''");
		}
	}

	private function getColorOpen($color, $inLatex)
	{
		if (!in_array($color, [1, 2, 3, 4]))
		{
			throw new MustNeverHappenException("Undefined color");
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
		$vals = [];

		$p = xml_parser_create();
		xml_parse_into_struct($p, "<text>$string</text>", $vals);
		xml_parser_free($p);

		return $vals;
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
