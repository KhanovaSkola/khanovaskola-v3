<?php

namespace App\Models\Rme;

use RuntimeException;


abstract class TokenException extends RuntimeException
{
	abstract public function getType();
}

class TokenNotValidException extends TokenException
{
	public function getType()
	{
		return 'notValid';
	}
}

class TokenExpiredException extends TokenException
{
	public function getType()
	{
		return 'expired';
	}
}

class TokenAlreadyUsedException extends TokenException
{
	public function getType()
	{
		return 'alreadyUsed';
	}
}
