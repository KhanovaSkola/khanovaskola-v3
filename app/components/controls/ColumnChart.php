<?php

namespace App\Components\Controls;

use App\Components\Control;


class ColumnChart extends Control
{

	/**
	 * @param string $dataPath router
	 * @param string $yTitle
	 */
	protected function renderDefault($dataPath, $yTitle)
	{
		$this->template->dataUrl = $this->presenter->link($dataPath);
		$this->template->yTitle = $this->translator->translate($yTitle);
	}

}
