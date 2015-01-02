<?php

namespace App\Models\Services;


class Gravatar
{

	/**
	 * @param string $email
	 * @return string
	 */
	protected function createHash($email)
	{
		return md5(strToLower(trim($email)));
	}

	/**
	 * @param string $email
	 * @param NULL|int $size
	 * @return string
	 */
	public function getUrl($email, $size = NULL)
	{
		return 'https://www.gravatar.com/avatar/' . $this->createHash($email) . '?' .
			http_build_query([
				'd' => '404',
				'rating' => 'g',
				's' => (int) ($size ?: 100),
			]);
	}

	/**
	 * Returns NULL if user does not have gravatar
	 *
	 * @param string $email
	 * @param NULL|int $size
	 * @return NULL|string
	 */
	public function getUrlOrNull($email, $size = NULL)
	{
		$url = $this->getUrl($email, $size);
		$headers = get_headers($url, TRUE);
		if (strpos($headers[0], '404') !== FALSE)
		{
			return NULL;
		}

		return $url;
	}

}
