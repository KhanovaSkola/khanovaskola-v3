<?php

namespace App\Models\Routers;

use Nette;
use Nette\Application\Request;
use Nette\Utils\Strings;


class OldCategory extends OldLinkRouter
{

	/**
	 * Maps HTTP request to a Request object.
	 *
	 * @param Nette\Http\IRequest $httpRequest
	 * @return NULL|Request
	 */
	public function match(Nette\Http\IRequest $httpRequest)
	{
		$slug = ltrim($httpRequest->getUrl()->getPath(), '/');
		if (Strings::contains($slug, '/'))
		{
			return NULL;
		}

		$id = $this->dibi->query('
			SELECT [c.id]
			FROM [old_links] [l]

			INNER JOIN [contents] [c] ON [c.youtube_id] = [l.target]

			WHERE [mask] = %s', $slug, '
		')->fetchSingle();
		if (!$id)
		{
			return NULL;
		}

		return new Request('Video:default', $httpRequest->getMethod(), [
			'videoId' => $id,
		]);
	}

}
