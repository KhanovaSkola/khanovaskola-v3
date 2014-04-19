<?php

namespace App\Model;

use Nette\DateTime;
use Nette\Security\Passwords;
use Orm;


/**
 * @property string $name
 * @property string $text purified html
 * @property DateTime $createdAt {default now}
 */
class Gist extends Entity
{

}
