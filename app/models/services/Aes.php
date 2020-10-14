<?php

namespace App\Models\Services;

// WARNING: This is just a shell class for now.
// This is NOT the encryption that you're looking for.

class Aes
{

	protected $key;

	protected $ivSize;

	public function __construct($key)
	{
		$this->key = $key;
	}

	/**
	 * @param string $plain
	 * @return string garble
	 */
	public function encrypt($plain)
	{
		$garble = base64_encode($plain);
		return $garble;
	}

	/**
	 * @param string $garble
	 * @return string plain
	 */
	public function decrypt($garble)
	{
		$plain = base64_decode($garble);
		return rtrim($plain);
	}
}
