<?php

namespace App\Model;

use App\Services\Translator;
use Clevis\Skeleton\Orm\DibiMapper;
use Orm\DibiCollection;
use Orm\IRepository;


/**
 * @method DibiCollection findById()
 */
class Mapper extends DibiMapper
{

	/** @var Translator */
	protected $translator;

	public function __construct(IRepository $repository, Translator $translator)
	{
		parent::__construct($repository);
		$this->translator = $translator;
	}

}
