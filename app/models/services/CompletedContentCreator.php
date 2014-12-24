<?php

namespace App\Models\Services;

use App\Models\Rme\CompletedContent;
use App\Models\Rme\User;
use App\Models\Rme\VideoView;
use App\Models\Structs\EventList;
use App\Models\Structs\LazyEntity;
use Kdyby\Events\Subscriber;


class CompletedContentCreator implements Subscriber
{

	/**
	 * @return array
	 */
	public function getSubscribedEvents()
	{
		return [EventList::VIDEO_WATCHED];
	}

	/**
	 * @param VideoView $view
	 * @param User|LazyEntity $user
	 */
	public function onVideoWatched(VideoView $view, $user)
	{
		// do not save another if completed in last 3 days
		$previous = $user->completedContents->get()->findBy(['content' => $view->video->id]);
		foreach ($previous as $record)
		{
			/** @var CompletedContent $record */
			if (abs(time() - $record->createdAt->getTimestamp()) < 3600 * 24 * 3)
			{
				return;
			}
		}

		$completion = new CompletedContent();
		$completion->schema = $view->schema;
		$completion->block = $view->block;
		$completion->content = $view->video;

		$user->completedContents->add($completion);
	}
}
