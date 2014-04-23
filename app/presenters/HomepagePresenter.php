<?php

namespace App\Presenters;

use App\Components\GistRenderer;
use Kdyby\Facebook\Facebook;
use Kdyby\Facebook\FacebookApiException;


final class HomepagePresenter extends BasePresenter
{

	public function actionDefault()
	{
		// $task = new SendMailTask('test', 'mikulas@khanovaskola.cz', ['foo' => 'bar']);
		// $this->context->getService('queue')->enqueue($task);

		$video = $this->orm->videos->getById(1);
		$this->template->video = $video;

		$gist = $this->orm->gists->getByName('test');
		/** @var GistRenderer $gistRenderer */
		$gistRenderer = $this['gist'];
		$gistRenderer->setEditable(TRUE);
		$gistRenderer->setGist($gist);

		// $this->eventManager->dispatchEvent('onVideoWatched', new EventArgsList([
		//	$this
		// ]));
		// dump($this->eventManager);
	}

	public function actionSearch($query)
	{
		$this->template->query = $query;
		$this->template->results = $this->orm->videos->getWithFulltext($query);
	}

	private function doesCurrentUserLikePage()
	{
		/** @var Facebook $fb */
		$fb = $this->context->getByType('Kdyby\\Facebook\\Facebook');
		$fb->setAccessToken($this->userEntity->facebookAccessToken);
		$pageId = $this->context->parameters['fb']['pageId'];
		try
		{
			return count($fb->api("me/likes/$pageId")->data) !== 0;
		}
		catch (FacebookApiException $e)
		{
			return FALSE; // safe fallback
		}
	}

}
