<?php

namespace App\Models\Structs;

use Nette\Application\Responses\JsonResponse;
use Nette\Http;
use Nette\Utils\Json;


class CachingJsonResponse extends JsonResponse
{

	/**
	 * Sends response to output.
	 *
	 * @param Http\IRequest $httpRequest
	 * @param Http\IResponse $httpResponse
	 * @throws \Nette\Utils\JsonException
	 */
	public function send(Http\IRequest $httpRequest, Http\IResponse $httpResponse)
	{
		echo Json::encode($this->payload);
	}

}
