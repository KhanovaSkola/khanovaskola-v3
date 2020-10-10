<?php

namespace App\Config;

use App\Models\Routers;
use App\Models\Routers\Redirect;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;
use Nette\DI\Container;
use Nextras\Routing\StaticRouter;


class Router extends RouteList
{

	public function __construct(Container $context)
	{
		parent::__construct();

		$secured = NULL;
		if ($context->getParameters()['tls'])
		{
			$secured = Route::SECURED;
		}

		$this[] = new StaticRouter(['Homepage:default' => 'index.php'], StaticRouter::ONE_WAY | $secured);
		$this[] = new StaticRouter([
			'Homepage:default' => '',
			'Homepage:preklad' => 'preklad',
			'Profile:default' => 'profil',
			'Auth:in' => 'prihlaseni',
			'Auth:out' => 'odhlaseni',
			'Auth:registration' => 'registrace',
			'Auth:resetPassword' => 'heslo',
			'Text:about' => 'o-skole',
			'Text:forTeachers' => 'pro-ucitele',
			'Text:team' => 'o-skole/tym',
			'Subjects:default' => 'predmety',
			'File:robots' => 'robots.txt',
			'Sitemap:default' => 'sitemap.xml',
			'Text:tos' => 'podminky',
			'Text:privacy' => 'soukromi'
		], $secured);

		$this[] = new Route('vyhledavani/?hledat=<query>', 'Search:results');

		$this[] = new Route('schema/[<action \D+>/]<schemaId \d+>[-<slug>]', 'Schema:default');
		$this[] = new Route('blok/[<action \D+>/][<schemaId \d+>/]<blockId \d+>[-<slug>]', 'Block:default');
		$this[] = new Route('video/[<action \D+>/][[<schemaId \d+>/]<blockId \d+>/]<videoId \d+>[-<slug>]?zacatek=<startAtTime \d+>', 'Video:default');

		// old links
		$this[] = new Route('video/<youtubeId>', 'Video:youtube');

		$this[] = new Route('<presenter>/<action \D+>[/<id>]', 'Homepage:default');
	}

}
