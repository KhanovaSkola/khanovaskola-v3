<?php

namespace App\Models\Services;


class SchemaLayout
{

	public function getDefaultLayout()
	{
		$layout = [];
		for ($col = 0; $col < 3; $col++)
		{
			$partial = [];
			for ($row = 0; $row < 20; $row++)
			{
				$partial[] = NULL;
				$partial[] = [];
			}
			$layout[] = $partial;
		}
		return $layout;
	}

	public function trim(array $layout)
	{
		for ($row = count($layout[0]) - 1; $row >= 0; $row--)
		{
			foreach ($layout as $col => $v)
			{
				if ($layout[$col][$row])
				{
					break 2;
				}
			}

			foreach ($layout as $col => $v)
			{
				unset($layout[$col][$row]);
			}
		}

		return $layout;
	}

	public function normalize(array $layout)
	{
		foreach ($layout as &$col)
		{
			foreach ($col as &$cell)
			{
				if (is_array($cell))
				{
					$cell = array_unique($cell);
				}
			}
		}

		// add spacer columns if missing
		if (count($layout) === 3)
		{
			$spacers = [[], []];

			foreach ([0, 1] as $spacer)
			{
				foreach ($layout[$spacer] as $cell)
				{
					if (is_array($cell))
					{
						$class = [];
						if (in_array('arrow-horizontal', $cell)
							|| in_array('arrow-branch-right', $cell)
							|| in_array('arrow-to-left', $cell))
							{
								$class[] = 'arrow-horizontal';
							}
						$spacers[$spacer][] = $class;
					}
					else
					{
						$spacers[$spacer][] = NULL;
					}
				}
			}

			array_splice($layout, 2, 0, [$spacers[1]]);
			array_splice($layout, 1, 0, [$spacers[0]]);
		}

		return $layout;
	}

}
