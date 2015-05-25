<?php

namespace App\Models\Services;

use App\Models\Rme\Blackboard;
use Nette\Utils\Json;


class BlackboardPreview
{

	/**
	 * @var Paths
	 */
	private $paths;

	public function __construct(Paths $paths)
	{
		$this->paths = $paths;
	}

	public function generate(Blackboard $bb, $outfile)
	{
		$raw = file_get_contents($this->paths->getBlackboards() . "/$bb->id.json");
		$data = Json::decode($raw, Json::FORCE_ARRAY);

		$min = ['width' => PHP_INT_MAX, 'height' => PHP_INT_MAX];
		$max = ['width' => 0, 'height' => 0];
		foreach ($data['data'] as $row)
		{
			if ($row['type'] !== 'beginStroke' && $row['type'] !== 'strokeTo')
			{
				continue;
			}

			$min['width'] = min($min['width'], $row['loc']['x']);
			$min['height'] = min($min['height'], $row['loc']['y']);
			$max['width'] = max($max['width'], $row['loc']['x']);
			$max['height'] = max($max['height'], $row['loc']['y']);
		}

		$margin = 20;
		$min['width'] -= $margin;
		$min['height'] -= $margin;
		$max['width'] += $margin;
		$max['height'] += $margin;

		$ratio = 2;

		$canvas = imagecreatetruecolor(
			($max['width'] - $min['width']) * $ratio,
			($max['height'] - $min['height']) * $ratio
		);

		if (function_exists('imageantialias'))
		{
			// this function is not in php5-gd and requires recompiling php
			imageantialias($canvas, TRUE);
		}

		$last = NULL;
		foreach ($data['data'] as $row)
		{
			if ($row['type'] === 'beginStroke')
			{
				$last = $row['loc'];
				continue;
			}
			if ($row['type'] === 'strokeTo')
			{
				$c = $row['color'];
				$color = imagecolorallocate($canvas, $c['r'], $c['g'], $c['b']);
				$this->imagelinethick($canvas,
					($last['x'] - $min['width']) * $ratio,
					($last['y'] - $min['height']) * $ratio,
					($row['loc']['x'] - $min['width']) * $ratio,
					($row['loc']['y'] - $min['height']) * $ratio,
					$color, 3
				);
				$last = $row['loc'];
			}
		}
		imagepng($canvas, $outfile, 9);
	}

	/**
	 * @see http://php.net/manual/en/function.imageline.php
	 */
	public function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick = 1)
	{
		/* this way it works well only for orthogonal lines
		imagesetthickness($image, $thick);
		return imageline($image, $x1, $y1, $x2, $y2, $color);
		*/
		if ($thick == 1) {
			return imageline($image, $x1, $y1, $x2, $y2, $color);
		}
		$t = $thick / 2 - 0.5;
		if ($x1 == $x2 || $y1 == $y2) {
			return imagefilledrectangle($image, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
		}
		$k = ($y2 - $y1) / ($x2 - $x1); //y = kx + q
		$a = $t / sqrt(1 + pow($k, 2));
		$points = [
			round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
			round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
			round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
			round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
		];
		imagefilledpolygon($image, $points, 4, $color);
		return imagepolygon($image, $points, 4, $color);
	}

}
