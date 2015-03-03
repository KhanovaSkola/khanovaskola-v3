<?php

namespace App\Models\Services;

use App\InvalidArgumentException;


class SsoContainer
{

	/**
	 * @var Sso[]
	 */
	protected $ssos;

	/**
	 * @param string $name
	 * @param Sso $sso
	 */
	public function addSso($name, Sso $sso)
	{
		if (isset($this->ssos[$name]))
		{
			throw new InvalidArgumentException("SSO service '$name' already exists");
		}
		$this->ssos[$name] = $sso;
	}

	/**
	 * @param string $name
	 * @return Sso
	 */
	public function getSso($name)
	{
		if (!isset($this->ssos[$name]))
		{
			throw new InvalidArgumentException("SSO service '$name' not set");
		}

		return $this->ssos[$name];
	}

}
