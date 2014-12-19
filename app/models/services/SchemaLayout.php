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

	public function buildBlockDependencies(array $layout)
	{
		$dependencies = [];
		for ($row = 1; $row < 100; $row++) // intentionally row > 0
		{
			foreach([0, 2, 4] as $col)
			{
				if (!array_key_exists($row, $layout[$col]))
				{
					break 2;
				}

				if ($layout[$col][$row] && !is_array($layout[$col][$row])) // is block
				{
					$blockDeps = [];

					// Now check all connected cells above current row until match is found
					$above = $layout[$col][$row - 1];
					if (in_array('arrow-vertical', $above) || in_array('arrow-down', $above))
					{
						if ($dep = $this->getBlockAbove($layout, $col, $row))
						{
							$blockDeps[] = $dep;
						}
					}
					if (isset($layout[$col - 2]) && in_array('arrow-horizontal', $layout[$col - 2][$row - 1]))
					{
						if ($dep = $this->getBlockAbove($layout, $col - 4, $row))
						{
							$blockDeps[] = $dep;
						}
					}
					if (isset($layout[$col + 2]) && in_array('arrow-horizontal', $layout[$col + 2][$row - 1]))
					{
						if ($dep = $this->getBlockAbove($layout, $col + 4, $row))
						{
							$blockDeps[] = $dep;
						}
					}
					if (in_array('arrow-to-right', $above))
					{
						if ($dep = $this->getBlockAbove($layout, $col - 2, $row))
						{
							$blockDeps[] = $dep;
						}
					}
					if (in_array('arrow-to-left', $above))
					{
						if ($dep = $this->getBlockAbove($layout, $col + 2, $row))
						{
							$blockDeps[] = $dep;
						}
					}

					$dependencies[$layout[$col][$row]] = $blockDeps;
				}
			}
		}

		return $dependencies;
	}

	private function getBlockAbove(array $layout, $sCol, $sRow)
	{
		for ($row = $sRow - 1; $row >= 0; $row--)
		{
			if (isset($layout[$sCol]) && array_key_exists($row, $layout[$sCol])
				&& $layout[$sCol][$row]
				&& !is_array($layout[$sCol][$row])
			)
			{
				return $layout[$sCol][$row];
			}
		}

		return NULL;
	}

}
