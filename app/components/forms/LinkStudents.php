<?php

namespace App\Components\Forms;

use Nette\Forms\Container;


class LinkStudents extends Form
{

	public function setup()
	{
		$emails = $this->addDynamic('emails', function(Container $container) {
			$container->addText('email')
				->addCondition($this::FILLED)
				->addRule($this::EMAIL); // TODO translate error message
		});
		for ($i = 0; $i < 5; ++$i)
		{
			$emails->createOne($i);
		}

		$this->addSubmit();
	}

	public function onSuccess()
	{
		$emails = [];
		foreach ($this->values->emails as $node)
		{
			if ($node->email)
			{
				$emails[] = $node->email;
			}
		}
		$emails = array_unique($emails);

		dump($emails);
	}

}
