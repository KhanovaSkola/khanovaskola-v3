<?php

namespace App\Orm;

use App\Rme\Tag;
use Orm\DibiCollection;


/**
 * @method HighlightCollection getWithFulltext()
 *
 * @method DibiCollection findById()
 * @method DibiCollection findByTag()
 *
 * @method array getNextContent()
 *
 * @method void addTagToContent(ContentEntity $entity, Tag $tag)
 */
abstract class ContentRepository extends Repository
{

}
