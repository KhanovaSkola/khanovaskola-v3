<?php

namespace App\Models\Routers;

use Nette\Application\Request;
use Nette\Http;
use Nette\Utils\Strings;


class OldBlog extends OldLinkRouter
{

	/**
	 * Maps HTTP request to a Request object.
	 *
	 * @param Http\IRequest $httpRequest
	 * @return NULL|Request
	 */
	public function match(Http\IRequest $httpRequest)
	{
		$path = ltrim($httpRequest->getUrl()->getPath(), '/');
		if (Strings::match($path, '~^blog(\?|/?$)~'))
		{
			header('Location: https://forum.khanovaskola.cz/c/khanova-skola/blog', TRUE, 301);
			die;
		}

		$match = Strings::match($path, '~^blog/(?P<slug>[^/]+)~');
		if (!$match)
		{
			return NULL;
		}

		$url = $this->dibi->query('
			SELECT [target]
			FROM [old_links]
			WHERE [mask] = %s', $match['slug'], '
		')->fetchSingle();
		if (!$url)
		{
			return NULL;
		}

		header("Location: $url", TRUE, 301);
		die;
	}

}
