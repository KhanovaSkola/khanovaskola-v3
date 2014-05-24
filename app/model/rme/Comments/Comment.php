<?php

namespace App\Rme;

use App\Orm\Entity;
use Orm;


/**
 * @property string $text
 *
 * @property NULL|\App\Rme\Comment $inReplyTo {m:1 comments $replies}
 * @property Orm\OneToMany $replies {1:m comments $inReplyTo}
 * @property \App\Rme\User $author {m:1 users $comments}
 * @property \App\Rme\Video $video {m:1 videos $comments}
 */
class Comment extends Entity
{

}
