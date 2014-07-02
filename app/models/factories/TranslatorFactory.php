<?php

namespace App\Models\Factories;

use App\Models\Services\Translator;
use Nette\Object;


class TranslatorFactory extends Object
{

	/**
	 * @var Translator
	 */
	private $translator;

	public function __construct(Translator $translator)
	{
		$this->translator = $translator;
	}

	/**
	 * @param string $prefix
	 * @return Translator
	 */
	public function create($prefix = NULL)
	{
		$t = clone $this->translator;
		$t->setPrefix("$prefix.");
		return $t;
	}

}
