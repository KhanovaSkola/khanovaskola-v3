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

	public function getInfo($username)
	{
		$result = $this->cache->load("username|$username", function(&$deps) use ($username) {
			$data = $this->request('/users/' . urlencode($username) . '.json');
      if ($data && isset($data['user'])) {
			  $deps[Cache::EXPIRE] = '20 hours';
			  return $data['user'];
      } else {
        return null;
      }
		});
    return $result ? $result : [];
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
    if ($raw === False)
    {
      //TODO: Add logging
      //log("Exception in Discourse API".$e->getMessage()."\n");
      return [];
    }

    try {
		  $response = Json::decode($raw, Json::FORCE_ARRAY);
    } catch (Nette\Utils\JsonException $e) {
      //TODO: Add logging
      //log("Exception when parsing Discourse API response:".$e->getMessage()."\n");
      return [];
    }
    return $response;
	}

	public function getAvatarUrl($username, $size)
	{
		$info = $this->getInfo($username);
    $avatar_url = '';
    if ($info && isset($info['avatar_template'])) {
      $avatar_url = self::DOMAIN . str_replace('{size}', $size, $info['avatar_template']);
    }
    return $avatar_url;
	}

	public function getMembersOf($groupId)
	{
		$result = $this->cache->load("group|$groupId", function(&$deps) use ($groupId) {
			$data = $this->request('/groups/' . urlencode($groupId) . '/members.json');
      if ($data && isset($data['members'])) {
			  $deps[Cache::EXPIRE] = '20 hours';
			  return $data['members'];
      } else {
        // null result is automatically not cached, unlike empty array it seems
        return null;
      }
		});
    return $result ? $result : [];
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
