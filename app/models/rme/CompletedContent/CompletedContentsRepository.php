<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use Orm\DibiCollection;


/**
 * @method DibiCollection|CompletedContent[] findAll()
 * @method Schema[] getLatestSchemas(User $user)
 * @method float getCompletedPercent(User $user, Schema $schema)
 */
class CompletedContentsRepository extends Repository
{

}
