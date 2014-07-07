<?php

namespace Bin\Support;

use Faker\Provider\Base;
use Faker\Provider\cs_CZ\Internet;
use Nette\Utils\Strings;


class DomainProvider extends Base
{

	public function email($first, $last)
	{
		if ($this->numberBetween(0, 100) > 90)
		{
			return Strings::webalize($first) . '@' . Strings::webalize($last) . '.' . $this->randomElement([
				'cz', 'cz', 'cz', 'cz', 'cz', 'cz', 'com', 'com', 'com', 'pro', 'name', 'info', 'net', 'org'
			]);
		}
		else
		{
			return Strings::webalize("$first.$last", '.') . '@' . Internet::freeEmailDomain();
		}
	}

}
