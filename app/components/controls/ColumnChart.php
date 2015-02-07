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
		$this->template->add('dataUrl', $this->presenter->link($dataPath));
		$this->template->add('yTitle', $this->translator->translate($yTitle));
	}

}
