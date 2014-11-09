<?php

namespace App\Config;

use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;
use Nette\DI\Container;


class Router extends RouteList
{

	public function __construct(Container $context)
	{
		parent::__construct();

		if ($context->getParameters()['tls'])
		{
			Route::$defaultFlags |= Route::SECURED;
		}

		$this[] = new Route('index.php', 'Homepage:default', Route::ONE_WAY);

		$this[] = new Route('esi/header/user', 'Esi:headerUser');

		$this[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
	}

}
