<?php

namespace App\Orm\Mapper;

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
