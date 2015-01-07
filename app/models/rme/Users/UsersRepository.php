<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use Orm\DibiCollection;


/**
 * @method DibiCollection findAll()
 * @method DibiCollection findRegistered()
 *
 * @method User getByFacebookId($facebookId)
 * @method User getByGoogleId($googleId)
 * @method User getByEmail($email)
 *
 * @method string getGender($firstName, $lastName = NULL)
 */
class UsersRepository extends Repository
{

}
