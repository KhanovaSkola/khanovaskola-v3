<?php

namespace App\Rme;

use App\Orm\Repository;
use Orm\DibiCollection;


/**
 * @method DibiCollection findAll()
 *
 * @method User getByFacebookId($facebookId)
 * @method User getByGoogleId($googleId)
 * @method User getByEmail($email)
 *
 * @method string getVocative($name, $gender)
 */
class UsersRepository extends Repository
{

}
