<?php

namespace App\Presenters;

use App\Models\Services\Discourse;
use App\Models\Services\DiscoursePurifier;


class Text extends Presenter
{

	/**
	 * @var Discourse
	 * @inject
	 */
	public $discourse;

	/**
	 * @var DiscoursePurifier
	 * @inject
	 */
	public $purifier;

	public function renderTeam()
	{
		$usernames = $this->discourse->getPromotedUsers();

                // Only example of how one can determine current language
//              $language = $this->translator->getLanguage();

		$users = [];
		foreach ($usernames as $username)
		{
			$info = $this->discourse->getInfo($username);

			if (!$info['uploaded_avatar_id'])
			{
				continue;
			}
			if (!isset($info['bio_cooked']))
			{
				continue;
			}

			$users[] = (object) [
				'name' => $info['name'],
				'title' => $info['title'],
				'avatar' => $this->discourse->getAvatarUrl($username, 240),
				'bio' => $this->purifier->filter($info['bio_cooked']),
				'forumUrl' => 'https://forum.khanovaskola.cz/users/' . urlencode($username) . '/activity',
			];
		}

		$this->template->users = $users;
	}

}
