<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;


/**
 * @property string $email
 * @property string $emailType
 */
class Unsubscribe extends Entity
{

	/**
	 * @param string $email
	 * @param string $type
	 */
	public function __construct($email, $type)
	{
		parent::__construct();

		$this->email = $email;
		$this->emailType = $type;
	}

}
