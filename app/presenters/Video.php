<?php

namespace App\Presenters;

use App\Components\Filters;
use App\Models\Rme;
use App\Presenters\Parameters;
use App\Models\Services\Discourse;
use Nette\Http\IResponse;


final class Video extends Content
{

	use Parameters\Block;
	use Parameters\Schema;
	use Parameters\Slug;
	use Parameters\Video;
	/**
	 * @var Discourse
	 * @inject
	 */
	public $discourse;

	/**
	 * @var int
	 * @persistent
	 */
	public $startAtTime = 0;

	/**
	 * @var Filters
	 * @inject
	 */
	public $filters;

	public function startup()
	{
		parent::startup();

		if ($this->action === 'youtube')
		{
			return;
		}

		$this->loadVideo();
		$this->loadBlock(function() {
			$block = $this->video->getRandomParent();
			if ($block)
			{
				$this->redirectToEntity($this->video, $block);
			}
		});
		$this->loadSchema(function() {
			if (!$this->block)
			{
				return NULL;
			}

			$schema = $this->block->getRandomParent();
			if ($schema)
			{
				$this->redirectToEntity($this->video, $this->block, $schema);
			}
		});

		if ($this->block && !$this->block->contains($this->video))
		{
			$this->redirectToEntity($this->video);
		}
		if ($this->block && $this->schema && !$this->schema->contains($this->block))
		{
			$this->redirectToEntity($this->video);
		}

		if ($this->video->removedAt) {
			$this->error('Video removed', IResponse::S410_GONE);
		}

		$this->checkSlug($this->video);
	}

	public function renderDefault()
	{
		list($nextContent, $nextBlock, $nextSchema) = $this->orm->contents->getNext($this->video, $this->block, $this->schema);

		$this->template->video = $this->video;
		$this->template->block = $this->block;
		$this->template->schema = $this->schema;
		$this->template->nextContent = $nextContent;
		$this->template->nextBlock = $nextBlock;
		$this->template->nextSchema = $nextSchema;
		$this->template->suggestions = $this->getSuggestions($this->video);
		$this->template->position = $this->block ? $this->block->getPositionOf($this->video) : NULL;
		$this->template->startAtTime = $this->startAtTime;

    // Show link to CS-KA above video
    $this->template->showKALink = true;
	}

	public function actionYoutube($youtubeId)
	{
		$video = $this->orm->contents->getVideoByYoutubeId($youtubeId);
		if (!$video)
		{
			$this->error();
		}

		$this->redirectToEntity($video);
	}

	public function handleReportError($time, $message, $browser, $os)
	{
		$name = $this->video->title;
		$link = $this->link('//this', ['startAtTime' => max(0, (int) $time - 3)]);
		$linkDiff = 'https://report.khanovaskola.cz/diff/youtube-id?youtubeId=' . urlencode($this->video->youtubeId);
		$ftime = $this->filters->duration($time);
		$user = $this->userEntity->name . ' (id ' . $this->userEntity->id . ')';

		if ($time === '{time}' && $message === '{message}')
		{
			$time = 0;
			$message = '';
		}

		$traps = 0;
		if (!trim($message))
		{
			$traps++;
      // DH ignore blank messages
			$this->sendJson(['status' => 'ignored']);
		}
		if ($time < 5)
		{
			$traps++;
		}
		if ($this->user->isEphemeralGuest())
		{
			$traps++;
		}

		if ($traps >= 2)
		{
			$this->sendJson(['status' => 'ignored']);
		}


		$sentences = $this->video->getTimedSentences();
		$key = NULL;
		foreach ($sentences as $i => $node)
		{
			if ($node['time'] > $time)
			{
				break;
			}
			$key = $i;
		}

		$context = '';
		for ($i = $key - 1; $i <= $key + 1; ++$i)
		{
			if (!isset($sentences[$i]))
			{
				continue;
			}

			$node = $sentences[$i];
			$at = $this->filters->duration($node['time']);
			$context .= "> [$at] $node[sentence]\n";
		}

		$mentions = [];
		$schema = $this->schema->title;
		foreach ($this->schema->editors as $editor)
		{
			$mentions[] = '@' . $editor->discourseUsername;
		}
		$mention = implode(', ', $mentions);

		$prefixedMessage = "> $message";

		$key = md5($this->videoId . '_' . microtime());
		$backlink = urlencode('https://forum.khanovaskola.cz/t/nahlasene-chyby/755'); // TODO link to correct post

    $message = <<<EOF
$mention

$schema: [**$name**]($link) v čase $ftime – [report]($linkDiff)

Navrhovaná změna / popis chyby:

$prefixedMessage

Originál:

$context

*reportoval $user*

*OS: $os*

[User-Agent](https://developers.whatismybrowser.com/useragents/parse/):
```
$browser
```
EOF;
    // Currently, $browser === platform.userAgent.
    // We could parse it here in the backend e.g. by:
    // https://github.com/yzalis/UAParser
    //
    // or use php get_browser()
    // https://www.php.net/manual/en/function.get-browser.php
    //
    // For now, we can analyze browser agent by hand e.g. at
    // https://developers.whatismybrowser.com/useragents/parse/

    // DH new way of sending, playing nice with Discourse API key
		$response = $this->discourse->sendReportError($message);

		$this->sendJson(['status' => 'success']);
	}

}
