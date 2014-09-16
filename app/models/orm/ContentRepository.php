<?php

namespace App\Models\Orm;

use App\Models\Rme\Content;
use App\Models\Rme\Tag;
use App\Models\Structs\Highlights;
use Orm\DibiCollection;


/**
 * @method Highlights\Collection getWithFulltext($query, array $fields = ['_all'])
 *
 * @method DibiCollection findById($id)
 * @method DibiCollection findByTag(Tag $tag)
 *
 * @method array getNextContent(Content $entity)
 *
 * @method void addTagToContent(Content $entity, Tag $tag)
 */
abstract class ContentRepository extends Repository
{

}
