<?php

namespace App\Rme;

use App\Orm\Entity;


/**
 * @property string $text
 *
 * @property \App\Rme\User $author {m:1 users $comments}
 * @property \App\Rme\Video $video {m:1 videos $comments}
 */
class Comment extends Entity
{

}
