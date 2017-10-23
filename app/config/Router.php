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
                        // Deprecated in Nette 2.4
			// Route::$defaultFlags |= Route::SECURED;
			$secured = Route::SECURED;
		}

		$this[] = new StaticRouter(['Homepage:default' => 'index.php'], StaticRouter::ONE_WAY | $secured);
		$this[] = new StaticRouter([
			'Homepage:default' => '',
			'Homepage:marathon' => 'maraton',
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
			'File:opensearch' => 'opensearch.xml',
			'File:robots' => 'robots.txt',
			'Sitemap:default' => 'sitemap.xml',
			'Text:tos' => 'podminky',
			'Text:privacy' => 'soukromi'
		], $secured);

		$this[] = new Route('vyhledavani/?hledat=<query>', 'Search:results');
		$this[] = new Route('vyhledavani/cviceni', 'Search:blueprints');

		$this[] = new Route('schema/[<action \D+>/]<schemaId \d+>[-<slug>]', 'Schema:default');
		$this[] = new Route('blok/[<action \D+>/][<schemaId \d+>/]<blockId \d+>[-<slug>]', 'Block:default');
		$this[] = new Route('video/[<action \D+>/][[<schemaId \d+>/]<blockId \d+>/]<videoId \d+>[-<slug>]?zacatek=<startAtTime \d+>', 'Video:default');
		$this[] = new Route('cviceni/[<action \D+>/][[<schemaId \d+>/]<blockId \d+>/]<blueprintId \d+>[-<slug>]', 'Blueprint:default');
		$this[] = new Route('tabule/[<action \D+>/][[<schemaId \d+>/]<blockId \d+>/]<blackboardId \d+>[-<slug>]?zacatek=<startAtTime \d+>', 'Blackboard:default');

		// old links
		$this[] = new Route('video/<youtubeId>', 'Video:youtube');
	//	$this[] = new Redirect('dobrovolnici', 'https://wiki.khanovaskola.cz/doku.php?id=dobrovolnici');
	//	$this[] = new Redirect('dobrovolnici/preklad', 'https://wiki.khanovaskola.cz/doku.php?id=jaknato');
	//	$this[] = new Redirect('dobrovolnici/pravidla-prekladu', 'https://wiki.khanovaskola.cz/doku.php?id=pravidla');
	//	$this[] = new Redirect('o-skole/projekty', 'https://wiki.khanovaskola.cz/doku.php?id=start');
	//	$this[] = new Redirect('kontakt', 'https://wiki.khanovaskola.cz/doku.php?id=tym');
		$this[] = $context->createInstance(Routers\OldVideo::class);
		$this[] = $context->createInstance(Routers\OldCategory::class);
		$this[] = $context->createInstance(Routers\OldBlog::class);

		$this[] = new Route('<presenter>/<action \D+>[/<id>]', 'Homepage:default');
	}

}
