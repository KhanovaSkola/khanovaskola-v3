<?php

namespace App\Presenters;

use Nette;
use App\Model\RepositoryContainer;


/**
 * @property-read RepositoryContainer $orm
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	/**
	 * @return RepositoryContainer
	 */
	public function getOrm()
	{
		return $this->context->getService('orm');
	}

}
