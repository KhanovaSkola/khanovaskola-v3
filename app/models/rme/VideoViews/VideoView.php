<?php

namespace App\Models\Rme;

use App;
use App\Models\Orm\Entity;


/**
 * @property App\Models\Rme\Video $video {m:1 videos $views}
 * @property App\Models\Rme\User $user {m:1 users $videosViewed}
 */
class VideoView extends Entity
{

}
