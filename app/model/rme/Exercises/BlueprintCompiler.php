<?php

namespace App\Rme;

use App\NotImplementedException;
use Nette\Object;
use Symfony\Component\Process\Process;


class BlueprintCompiler extends Object
{

	/** @var int */
	private $seed;

	public function __construct()
	{
		$this->seed = mt_rand();
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
					$val = abs($this->expand($val, $vars));
					$vars[$var] = $val === 1 ? $one : ($val >= 2 && $val <= 4 ? $few : $many);
					break;
				default:
					throw new NotImplementedException;
			}
		}

		$exercise['vars'] = $vars;
		$exercise['question'] = $this->expand($blueprint->question, $vars);
		$exercise['answer'] = $this->expand($blueprint->answer, $vars);
		$exercise['hints'] = [];
		foreach ($blueprint->hints as $i => $hint)
		{
			$exercise['hints'][$i] = $this->expand($hint, $vars);
		}

		return new Exercise($blueprint, $this->seed, $exercise['question'], $exercise['answer'], $exercise['hints']);
	}

	/**
	 * @param string $mask
	 * @param array $vars
	 * @return string
	 */
	private function expand($mask, array $vars)
	{
		$string = preg_replace_callback('~\{([^}]+?)\}~', function($match) use ($vars) {
			$eval = $match[1];
			foreach ($vars as $var => $value)
			{
				$eval = preg_replace('~\b' . preg_quote($var, '~') . '\b~', $value, $eval);
			}

			if (preg_match('~^[0-9.+/*^\s-]+$~', $eval))
			{
				return $this->evaluateMath($eval);
			}
			return $eval;

		}, $mask);

		return $string;
	}

	/**
	 * @param string $eval
	 * @return float
	 */
	private function evaluateMath($eval)
	{
		$process = new Process(sprintf('echo %s | bc', $eval));
		$process->setTimeout(1);
		$process->run();
		return trim($process->getOutput());
	}

}
