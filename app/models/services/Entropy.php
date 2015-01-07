<?php

namespace App\Models\Services;

use App\Models\Rme\User;
use Nette\Utils\Strings;
use ZxcvbnPhp\Zxcvbn;


class Entropy
{

	/**
	 * @var Zxcvbn
	 */
	protected $computer;

	public function __construct()
	{
		$this->computer = new Zxcvbn();
	}

	public function compute($password, User $user)
	{
		$fields = ['name', 'email', 'familyName', 'firstName'];
		$parts = [];
		$index = 1;
		foreach ($fields as $field)
		{
			foreach (preg_split('~[@._\s+]~', $user->$field) as $part)
			{
				$parts[$part] = $index++;
				$parts[Strings::toAscii($part)] = $index++;
			}
		}

		try
		{
			$result = $this->computer->passwordStrength($password, $parts);
		}
		catch (\Exception $e)
		{
			return NULL;
		}

		return number_format($result['entropy'], 2);
	}

}
