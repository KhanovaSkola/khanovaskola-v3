<?php

namespace App\Presenters;

use App\Components\Controls\Comments;
use App\Components\Filters;
use App\Models\Rme;
use App\Presenters\Parameters;


final class Video extends Content
{

	use Parameters\Block;
	use Parameters\Schema;
	use Parameters\Slug;
	use Parameters\Video;

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

	public function createComponentComments()
	{
		return $this->buildComponent(Comments::class, [$this->video]);
	}

	public function handleReportError($time, $message)
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

		$key = md5($this->videoId . '_' . microtime());
		$backlink = urlencode('https://forum.khanovaskola.cz/t/nahlasene-chyby/755'); // TODO link to correct post
		$checkbox = <<<CB
<a href="https://report.khanovaskola.cz/check.php?key=$key&do=toggle&redirect=$backlink"><img src="https://report.khanovaskola.cz/check.php?key=$key" width="14" height="14"> vyřešeno</a>
CB;

	$url = 'https://forum.khanovaskola.cz/posts?' . http_build_query([
			'api_key' => 'a7d7a2da4aadbc9acd5875bd0a7b1967141622c34a7b3bd42dc74f46910727c8',
			'api_username' => 'system',
			'topic_id' => 755,
			'raw' => <<<EOF
$mention

$schema: [**$name**]($link) v čase $ftime – [report]($linkDiff)

Navrhovaná změna / popis chyby:

    $message

Originál:

$context

*reportoval $user*
EOF
		]);

		$context = stream_context_create([
			'http' => [
				'method' => 'POST',
				'header' => implode("\r\n", [
					'Accept-language: en',
				])
			]
		]);
		file_get_contents($url, NULL, $context);

		$this->sendJson(['status' => 'success']);
	}

}
