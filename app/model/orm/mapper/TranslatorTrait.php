<?php

namespace App\Orm\Mapper;

use App\Services\Translator;


/**
 * Must only be used by Mapper
 */
trait TranslatorTrait
{

	/** @var Translator */
	protected $translator;

	public function injectTranslator(Translator $translator)
	{
		$this->translator = $translator;
	}

}
