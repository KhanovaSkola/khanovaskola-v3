<?php

namespace App\Models\Orm\Mappers;

use App\Models\Services\Translator;


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
