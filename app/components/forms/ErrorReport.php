<?php

namespace App\Components\Forms;


class ErrorReport extends Form
{

	public function setup()
	{
		$this->addTextArea('text')
			->addRule($this::FILLED, 'text.missing')
			->addRule($this::MIN_LENGTH, 'text.short', 15);

		$this->addSubmit();
	}

	public function onSuccess()
	{
		$v = $this->getValues();

		dump($v);
	}
}
