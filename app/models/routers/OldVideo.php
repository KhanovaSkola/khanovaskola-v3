<?php

namespace App\Models\Routers;

use Nette\Application\Request;
use Nette\Http;
use Nette\Utils\Strings;


class OldVideo extends OldLinkRouter
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
		$match = Strings::match($path, '~^([^/]+)/(?P<slug>[^/]+)/lekce~');
		if (!$match)
		{
			return NULL;
		}

		$id = $this->dibi->query('
			SELECT [c.id]
			FROM [old_links] [l]

			INNER JOIN [contents] [c] ON [c.youtube_id] = [l.target]

			WHERE [mask] = %s', $match['slug'], '
		')->fetchSingle();

		if (!$id)
		{
			return NULL;
		}

		return new Request('Video', $httpRequest->getMethod(), [
			'action' => 'default',
			'videoId' => $id,
		]);
	}

}
