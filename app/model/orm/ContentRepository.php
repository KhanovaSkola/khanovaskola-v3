<?php

namespace App\Orm;

use App\Rme\Tag;
use Orm\DibiCollection;


/**
 * @method HighlightCollection getWithFulltext($query, array $fields = ['_all'])
 *
 * @method DibiCollection findById($id)
 * @method DibiCollection findByTag(Tag $tag)
 *
 * @method array getNextContent(ContentEntity $entity)
 *
 * @method void addTagToContent(ContentEntity $entity, Tag $tag)
 */
abstract class ContentRepository extends Repository
{

}
