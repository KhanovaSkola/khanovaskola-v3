<?php

namespace Bin\Services;

use Bin\Support\DomainProvider;
use Faker\Factory;


class FakerFactory
{

	public static function create()
	{
		$faker = Factory::create('cs_CZ');
		$faker->addProvider(new DomainProvider($faker));
		return $faker;
	}

}
