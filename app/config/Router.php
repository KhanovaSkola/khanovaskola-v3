<?php

namespace App\Config;

use App\Models\Routers;
use App\Models\Routers\Redirect;
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
		$this[] = new Route('', 'Homepage:default');

		$this[] = new Route('esi/header/user', 'Esi:headerUser');
		$this[] = new Route('profil', 'Profile:default');
		$this[] = new Route('prihlaseni', 'Auth:in');
		$this[] = new Route('odhlaseni', 'Auth:out');
		$this[] = new Route('heslo', 'Auth:resetPassword');
		$this[] = new Route('o-skole', 'Text:about');
		$this[] = new Route('predmety', 'Subjects:default');
		$this[] = new Route('vyhledavani/?hledat=<query>', 'Search:results');

		$this[] = new Route('sitemap[!.xml]', 'Sitemap:default');

		$this[] = new Route('opensearch.xml', 'File:opensearch');
		$this[] = new Route('robots.txt', 'File:robots');

		$this[] = new Route('schema/[<action>/]<schemaId>[-<slug>]', 'Schema:default');
		$this[] = new Route('blok/[<action>/][<schemaId>/]<blockId>[-<slug>]', 'Block:default');
		$this[] = new Route('video/[<action>/][[<schemaId>/]<blockId>/]<videoId>[-<slug>]', 'Video:default');
		$this[] = new Route('cviceni/[<action>/][[<schemaId>/]<blockId>/]<blueprintId>[-<slug>]', 'Blueprint:default');

		// old links
		$this[] = new Redirect('dobrovolnici', 'https://wiki.khanovaskola.cz/doku.php?id=dobrovolnici');
		$this[] = new Redirect('dobrovolnici/preklad', 'https://wiki.khanovaskola.cz/doku.php?id=jaknato');
		$this[] = new Redirect('dobrovolnici/pravidla-prekladu', 'https://wiki.khanovaskola.cz/doku.php?id=pravidla');
		$this[] = new Redirect('o-skole/projekty', 'https://wiki.khanovaskola.cz/doku.php?id=start');
		$this[] = new Redirect('kontakt', 'https://wiki.khanovaskola.cz/doku.php?id=tym');
		$this[] = $context->createInstance(Routers\OldVideo::class);
		$this[] = $context->createInstance(Routers\OldCategory::class);
		$this[] = $context->createInstance(Routers\OldBlog::class);

		$this[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
	}

}
