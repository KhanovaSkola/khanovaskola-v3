<?php

namespace App\Model;

use Orm\DibiCollection;


/**
 * @mapper App\Model\Mapper
 *
 * @method DibiCollection findAll()
 *
 * @method User getByFacebookId()
 * @method User getByGoogleId()
 * @method User getByEmail()
 */
class UsersRepository extends Repository
{

}
