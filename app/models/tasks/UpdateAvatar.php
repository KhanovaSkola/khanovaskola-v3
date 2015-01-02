<?php

namespace App\Models\Tasks;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\User;
use App\Models\Services\Gravatar;
use App\Models\Structs\EntityPointer;


class UpdateAvatar extends Task
{

	/**
	 * @var EntityPointer to User
	 */
	private $pUser;

	public function __construct(User $user)
	{
		$this->pUser = new EntityPointer($user);
	}

	/**
	 * @param RepositoryContainer $orm
	 * @param Gravatar $gravatar
	 */
	public function run(RepositoryContainer $orm, Gravatar $gravatar)
	{
		/** @var User $user */
		$user = $this->pUser->resolve($orm);

		$url = $gravatar->getUrlOrNull($user->email);
		if ($url)
		{
			$user->avatar = $url;
		}

		$orm->flush();
	}

}
