<?php

namespace App\Models\Structs;


class Gender
{

	const MALE = 'male';
	const FEMALE = 'female';
	const OTHER = 'other';

	/**
	 * @return array
	 */
	public static function getGenders()
	{
		return [
			self::MALE => self::MALE,
			self::FEMALE => self::FEMALE,
			self::OTHER => self::OTHER,
		];
	}

}
