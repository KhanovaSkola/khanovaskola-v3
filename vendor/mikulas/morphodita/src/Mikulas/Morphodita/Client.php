<?php

namespace Mikulas\Morphodita;

use Nette\Utils\Json;


class Client
{

	const ENDPOINT = 'https://lindat.mff.cuni.cz/services/morphodita/api';
	const LEMMA_SEPARATOR = "\n";


	/**
	 * @param $words
	 * @return array [sentences => words => [lemma, ?space]]
	 */
	public function tokenize($words)
	{
		return $this->request('/tokenize', ['data' => $words]);
	}


	/**
	 * @param $words
	 * @return array [sentences => words => [lemma, token, tag, ?space]]
	 */
	public function tag($words)
	{
		return $this->request('/tag', ['data' => $words]);
	}


	/**
	 * @param array $lemmas [string lemma, ?string tag] or string lemma
	 * @return mixed
	 */
	public function generate(array $lemmas)
	{
		$lines = [];
		foreach ($lemmas as $row) {
			if (is_array($row)) {
				list($lemma) = $row;
				$lines[] = $lemma;

			} else {
				$lines[] = $row;
			}
		}

		$words = $this->request('/generate', [
			'data' => implode(self::LEMMA_SEPARATOR, $lines),
		]);

		foreach ($lemmas as $i => $row) {
			if (is_array($row)) {
				foreach ($words[$i] as $form) {
					if ($form['tag'] === $row[1]) {
						$words[$i] = $form;
						break;
					}
				}
			}
		}

		return $words;
	}


	/**
	 * @param string $method "/tag"
	 * @param array $args [data => string]
	 * @return mixed
	 * @throws \Nette\Utils\JsonException
	 */
	protected function request($method, $args)
	{
		$args = $args + ['output' => 'json'];

		$url = self::ENDPOINT . "$method?" . http_build_query($args);
		$raw = file_get_contents($url);
		return Json::decode($raw, Json::FORCE_ARRAY)['result'];
	}

}
