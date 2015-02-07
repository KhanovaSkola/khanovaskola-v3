<?php

namespace App\Models\Services\Consumers;

use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Gravatar;


class UpdateAvatar extends Consumer
{

	/**
	 * @var Gravatar
	 */
	private $gravatar;

	public function __construct(RepositoryContainer $orm, Gravatar $gravatar)
	{
		parent::__construct($orm);
		$this->gravatar = $gravatar;
	}

	public function invoke(array $args)
	{
		$user = $args['user'];

		$url = $this->gravatar->getUrlOrNull($user->email);
		if ($url)
		{
			$user->avatar = $url;
		}

		$this->orm->flush();
	}

}
