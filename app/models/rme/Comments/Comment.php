<?php

namespace App\Models\Rme;

use App;
use App\Models\Orm\Entity;
use Orm;


/**
 * @property string $text
 *
 * @property NULL|App\Models\Rme\Comment $inReplyTo {m:1 comments $replies}
 * @property Orm\OneToMany $replies {1:m comments $inReplyTo}
 * @property App\Models\Rme\User $author {m:1 users $comments}
 * @property App\Models\Rme\Video $video {m:1 videos $comments}
 */
class Comment extends Entity
{

}
