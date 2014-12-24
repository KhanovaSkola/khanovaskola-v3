<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use Orm\DibiCollection;


/**
 * @method DibiCollection findAll()
 *
 * @method User getByFacebookId($facebookId)
 * @method User getByGoogleId($googleId)
 * @method User getByEmail($email)
 *
 * @method string getVocative($name, $gender)
 * @method string guessGender($name)
 */
class UsersRepository extends Repository
{

}
