<?php

namespace App\Models\Services;

use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\Utils\Json;


class Discourse
{

	const DOMAIN = 'https://forum.khanovaskola.cz';

	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * @var string
	 */
	private $apiUsername;

	public function __construct($apiKey, $apiUsername, IStorage $storage)
	{
		$this->apiKey = $apiKey;
		$this->apiUsername = $apiUsername;
		$this->cache = new Cache($storage, 'discourse');
	}

	/**
	 * @param string $email
	 * @return NULL|string
	 * @throws \Nette\Utils\JsonException
	 */
	public function getUsername($email)
	{
		$data = $this->request('/admin/users/list/active.json', ['filter' => $email]);

		if (count($data) === 0)
		{
			return NULL;
		}

		$user = array_pop($data);
		return $user['username'];
	}

	public function getInfo($username)
	{
		return $this->cache->load("username|$username", function(&$deps) use ($username) {
			$data = $this->request('/users/' . urlencode($username) . '.json');

			$deps[Cache::EXPIRE] = '20 hours';

			return $data['user'];
		});
	}

	private function request($req, $args = [])
	{
	  $context = stream_context_create([
			'http' => [
				'method' => 'GET',
				'header' => implode("\r\n", [
					'Accept-language: en',
          'Api-Key: '.$this->apiKey,
          'Api-Username: '.$this->apiUsername,
          'Content-Type: application/json',
				])
			]
	  ]);

		$url = self::DOMAIN . "$req?" . http_build_query($args);
		$raw = file_get_contents($url, NULL, $context);
		return Json::decode($raw, Json::FORCE_ARRAY);
	}

	public function getAvatarUrl($username, $size)
	{
		$info = $this->getInfo($username);
		return self::DOMAIN . str_replace('{size}', $size, $info['avatar_template']);
	}

	public function getMembersOf($groupId)
	{
		return $this->cache->load("group|$groupId", function(&$deps) use ($groupId) {
			$data = $this->request('/groups/' . urlencode($groupId) . '/members.json');
			$deps[Cache::EXPIRE] = '20 hours';
			return $data['members'];
		});
	}

	/**
	 * @return string[] usernames
	 */
	public function getPromotedUsers()
	{
		$usernames = [];
		foreach (['vybor', 'videotvurci', 'proofreaders'] as $group)
		{
			foreach ($this->getMembersOf($group) as $user)
			{
				$usernames[$user['username']] = TRUE;
			}
		}

		return array_keys($usernames);
	}


  // called from Video.php::ReportErrorHandler
  public function sendReportError($message) {

    $topic_id = 755; // "Nahlášené chyby"

	  $url = 'https://forum.khanovaskola.cz/posts?' . http_build_query([
			'topic_id' => $topic_id,
			'raw' => $message
	  ]);
                
	  $context = stream_context_create([
			'http' => [
				'method' => 'POST',
				'header' => implode("\r\n", [
					'Accept-language: en',
          'Api-Key: '.$this->apiKey,
          'Api-Username: '.$this->apiUsername,
          'Content-Type: application/x-www-form-urlencoded',
				])
			]
	  ]);

    $response = file_get_contents($url, NULL, $context);

    return $response;
  }

}
