<?php

namespace App\Models\Rme;

use App;
use App\Models\Orm\Entity;
use Orm;
use Orm\OneToMany as OtM;


/**
 * @property string           $text
 * @property NULL|Comment     $inReplyTo {m:1 comments $replies}
 * @property OtM|Comment[]    $replies   {1:m comments $inReplyTo}
 * @property User             $author    {m:1 users $comments}
 * @property Content          $content   {m:1 contents $comments}
 */
class Comment extends Entity
{

}
