<?php

namespace App\Components;


class ColumnChart extends Control
{

	/**
	 * @param string $dataPath router
	 */
	public function renderDefault($dataPath, $yTitle)
	{
		$this->template->dataUrl = $this->presenter->link($dataPath);
		$this->template->yTitle = $yTitle; // TODO translator
	}

}
