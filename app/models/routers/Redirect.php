<?php

namespace App\Models\Routers;

use Nette;
use Nette\SmartObject;
use Nette\Application\IRouter;
use Nette\Application\Request;


class Redirect implements IRouter
{
  use SmartObject;

	/**
	 * @var
	 */
	private $mask;

	/**
	 * @var
	 */
	private $target;

	public function __construct($mask, $target)
	{
		$this->mask = $mask;
		$this->target = $target;
	}

	/**
	 * Maps HTTP request to a Request object.
	 *
	 * @param Nette\Http\IRequest $httpRequest
	 * @return NULL|Request
	 */
	public function match(Nette\Http\IRequest $httpRequest)
	{
		$path = ltrim($httpRequest->getUrl()->getPath(), '/');
		if (Nette\Utils\Strings::match($path, '~^' . preg_quote($this->mask, '~') . '/*($|\?)~'))
		{
			header("Location: {$this->target}", TRUE, 301);
			die;
		}
		return NULL;
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
