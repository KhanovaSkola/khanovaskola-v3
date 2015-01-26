<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use Orm\DibiCollection;


/**
 * @method DibiCollection|Block[] findAll()
 * @method DibiCollection|Block[] findAllButOldWeb()
 * @method mixed                  findByFulltext($type, $query, $limit = 10, $offset = 0)
 * @method NULL|Content           getNextContent(User $user, Block $block)
 */
class BlocksRepository extends Repository
{

}
