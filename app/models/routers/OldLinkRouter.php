<?php

namespace App\Models\Routers;

use App\Models\Orm\RepositoryContainer;
use DibiConnection;
use Nette;
use Nette\Application\IRouter;
use Nette\Application\Request;


abstract class OldLinkRouter implements IRouter
{

	/**
	 * @var DibiConnection
	 */
	protected $dibi;

	/**
	 * @var RepositoryContainer
	 */
	protected $orm;

	public function __construct(DibiConnection $dibi, RepositoryContainer $orm)
	{
		$this->dibi = $dibi;
		$this->orm = $orm;
	}

	/**
	 * Constructs absolute URL from Request object.
	 *
	 * @param Request $appRequest
	 * @param Nette\Http\Url $refUrl
	 * @return NULL|string
	 */
	public function constructUrl(Request $appRequest, Nette\Http\Url $refUrl)
	{
		return NULL;
	}

}
