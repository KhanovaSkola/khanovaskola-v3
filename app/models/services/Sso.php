<?php

namespace App\Models\Services;

use App\Models\Rme\User;
use Nette\Object;


/**
 * Single Sign On
 * @see https://meta.discourse.org/t/official-single-sign-on-for-discourse/13045
 */
class Sso extends Object
{

	private $secret;
	private $redirect;

	public function __construct($secret, $redirect)
	{
		$this->secret = $secret;
		$this->redirect = $redirect;
	}

	public function getSignature($payload)
	{
		return hash_hmac('sha256', $payload, $this->secret);
	}

	protected function getNonce($payload)
	{
		$query = [];
		parse_str(base64_decode($payload), $query);
		return $query['nonce'];
	}

	public function getLoginUrl($payload, User $user)
	{
		$params = [
			'nonce' => $this->getNonce($payload),
			'email' => $user->email,
			'external_id' => $user->getSsoId(),
			'name' => $user->name,
		];

		$response = base64_encode(http_build_query($params));
		$url = rtrim($this->redirect, '?') . '?';
		return $url . http_build_query([
			'sso' => $response,
			'sig' => $this->getSignature($response)
		]);
	}

}
