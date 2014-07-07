<?php

namespace Tests\Cases\Unit;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Tag;
use App\Models\Rme\Video;
use App\Models\Services\Neo4j;
use Nette;
use Tester;
use Tester\Assert;
use Tests\TestCase;


$container = require __DIR__ . '/../../../../../bootstrap.php';

class Neo4jTraitTest extends TestCase
{

	/**
	 * @var Neo4j @inject
	 */
	public $neo4j;

	/**
	 * @var RepositoryContainer @inject
	 */
	public $orm;

	public function testCrud()
	{
		$video = new Video;
		$video->title = 'Dummy video';
		$video->description = 'Dummy desc';
		$video->youtubeId = 'abcedfg';

		$tag = new Tag;
		$tag->title = 'Dummy tag';

		$this->orm->tags->attach($tag);
		$this->orm->videos->attach($video);
		$this->orm->flush();

		$video->addTag($tag);

		$found = $this->orm->videos->findByTag($tag);
		Assert::same(1, $found->count());
		/** @var Video $foundVideo */
		$foundVideo = $found->fetch();
		Assert::same($video->id, $foundVideo->id);
	}

}

runTests(__FILE__, $container);
