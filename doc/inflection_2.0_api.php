<?php

class Inflection
{

	const GENDER = 'g';
	const CASE_N = 'c';
	const NUMBER = 'n';

	const MALE = 'M';
	const MALE_ANIMATE = 'M';
	const MALE_INANIMATE = 'I';
	const FEMALE = 'F';
	const NEUTER = 'N';

	const NOMINATIVE = 1;
	const KDO_CO = 1;
	const GENITIVE = 2;
	const KOHO_CEHO = 2;
	const DATIVE = 3;
	const KOMU_CEMU = 3;
	const ACCUSATIVE = 4;
	const KOHO_CO = 4;
	const VOCATIVE = 5;
	const OSLOVENI = 5;
	const LOCATIVE = 6;
	const OKOM_OCEM = 6;
	const INSTRUMENTAL = 7;
	const KYM_CIM = 7;

	const SINGULAR = 'S';
	const PLURAL = 'P';

	/**
	 * @param string $phrase
	 * @param array $flags
	 * @return string inflected
	 */
	public static function inflect($phrase, array $flags) {}

}
