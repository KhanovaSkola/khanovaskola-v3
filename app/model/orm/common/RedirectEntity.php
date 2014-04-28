<?php

namespace App\Model;

use App\InvalidStateException;
use Nelmio\Alice\Loader\Porm;
use Nette\Application\UI\Presenter;
use Nette\Caching\Cache;
use Nette\Utils\Strings;
use Orm;


/**
 * @property TitledEntity $redirectTo
 */
final class RedirectEntity extends TitledEntity
{

}
