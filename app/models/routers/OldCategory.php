<?php

namespace App\Models\Routers;

use Nette;
use Nette\Application\Request;


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

		return new Request('Video', $httpRequest->getMethod(), [
			'action' => 'default',
			'videoId' => $id,
		]);
	}

}
