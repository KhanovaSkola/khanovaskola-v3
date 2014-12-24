<?php

namespace App\Models\Services;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\User;
use Nette\Object;


class UserMerger extends Object
{

	/**
	 * @var RepositoryContainer
	 */
	private $orm;

	public function __construct(RepositoryContainer $orm)
	{
		$this->orm = $orm;
	}

	/**
	 * Only merges fields guest user can have,
	 * does not override email, name etc.
	 *
	 * @param User $from guest user
	 * @param User $target registered user
	 */
	public function mergeUserInto(User $from, User $target)
	{
		$db = $this->orm->users->getMapper()->getConnection();
		foreach (['answers', 'badge_user_bridges', 'completed_blocks', 'completed_contents', 'video_views'] as $table)
		{
			$db->query('
				UPDATE [' . $table . '] SET [user_id] = %i', $target->id, '
				WHERE [user_id] = %i', $from->id);
		}

		$this->orm->users->remove($from);
	}

}
