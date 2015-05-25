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
		imageantialias($canvas, TRUE);
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
				imageline($canvas,
					($last['x'] - $min['width']) * $ratio,
					($last['y'] - $min['height']) * $ratio,
					($row['loc']['x'] - $min['width']) * $ratio,
					($row['loc']['y'] - $min['height']) * $ratio,
					$color
				);
				$last = $row['loc'];
			}
		}
		imagepng($canvas, $outfile, 9);
	}

}
