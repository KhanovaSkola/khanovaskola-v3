<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use Orm\DibiCollection;


/**
 * @method DibiCollection|Subject[] findAll()
 * @method DibiCollection|Block[] findAllButOldWeb()
 * @method DibiCollection|Subject[] findAllOldWeb()
 */
class SubjectsRepository extends Repository
{

}
