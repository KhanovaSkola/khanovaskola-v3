<?php

namespace App\Models\Services;

use Nette\Utils\Json;


class Discourse
{

	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * @var string
	 */
	private $apiUsername;

	public function __construct($apiKey, $apiUsername)
	{
		$this->apiKey = $apiKey;
		$this->apiUsername = $apiUsername;
	}

	/**
	 * @param string $email
	 * @return NULL|string
	 * @throws \Nette\Utils\JsonException
	 */
	public function getUsername($email)
	{
		$url = 'https://forum.khanovaskola.cz/admin/users/list/active.json?' . http_build_query([
			'filter' => $email,
			'api_key' => $this->apiKey,
			'api_username' => $this->apiUsername
		]);
		$raw = file_get_contents($url);
		$data = Json::decode($raw, Json::FORCE_ARRAY);

		if (count($data) === 0)
		{
			return NULL;
		}

		$user = array_pop($data);
		return $user['username'];
	}

}
