<?php

namespace App\Models\Rme;

use RuntimeException;


abstract class TokenException extends RuntimeException {}

class TokenNotValidException extends TokenException {}

class TokenExpiredException extends TokenException {}

class TokenAlreadyUsedException extends TokenException {}
