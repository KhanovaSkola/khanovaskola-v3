<?php

namespace Bin\Services;

use App\Models\Services\ISubtitleFetcher;
use Faker\Generator;


class FakeSubtitles implements ISubtitleFetcher
{

	/**
	 * @var \Faker\Generator
	 */
	private $faker;

	public function __construct(Generator $faker)
	{
		$this->faker = $faker;
	}

	/**
	 * @param string $youtubeId
	 * @return string
	 */
	public function getSubtitles($youtubeId)
	{
		return $this->faker->sentence(100);
	}

	/**
	 * @param string $youtubeId
	 * @return string
	 */
	public function getTextFromSubtitles($youtubeId)
	{
		return $this->faker->sentence(100);
	}

}
