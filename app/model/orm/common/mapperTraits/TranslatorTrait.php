<?php

namespace App\Model;

use App\Services\Translator;


trait TranslatorTrait
{

	/** @var Translator */
	protected $translator;

	public function injectTranslator(Translator $translator)
	{
		$this->translator = $translator;
	}

}
