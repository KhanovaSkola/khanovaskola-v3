<?php

namespace Tests\Cases\Unit;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Block;
use App\Models\Rme\BlockSchemaBridge;
use App\Models\Rme\Content;
use App\Models\Rme\ContentBlockBridge;
use App\Models\Rme\Schema;
use App\Models\Rme\User;
use App\Models\Structs\Gender;
use Tester\Assert;
use Tests\TestCase;


$container = require __DIR__ . '/../../../bootstrap.php';

/**
 * Integration test.
 * There are no wild errors while linking those entities
 * and when persisting.
 */
class ContentModelTest extends TestCase
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $repos;

	public function testBlockSchema()
	{
		$user = new User();
		$user->gender = Gender::MALE;
		$this->repos->users->persist($user);
		$user->setNames('Karel Marek');

		$schema = new Schema();
		$schema->author = $user;
		$schema->name = 'Dummy Schema';

		$this->repos->schemas->persist($schema);

		for ($i = 0; $i < 5; $i++)
		{
			$block = new Block();
			$block->author = $user;
			$block->name = "Dummy Block $i";
			$this->repos->blocks->persist($block);

			$bridge = new BlockSchemaBridge();
			$bridge->block = $block;
			$bridge->schema = $schema;
			$bridge->position = 1;

			$this->repos->blockSchemaBridges->persist($bridge);
		}

		Assert::same(5, $schema->blockSchemaBridges->count());
	}

	public function testContentBlock()
	{
		$user = new User();
		$user->gender = Gender::MALE;
		$this->repos->users->persist($user);
		$user->setNames('Karel Marek');

		$block = new Block();
		$block->author = $user;
		$block->name = 'Dummy Block';
		$this->repos->blocks->persist($block);

		for ($i = 0; $i < 5; $i++)
		{
			$content = new Content();
			$content->title = "Dummy Content $i";
			$content->description = 'lorem ipsum';
			$this->repos->contents->persist($content);

			$bridge = new ContentBlockBridge();
			$bridge->content = $content;
			$bridge->block = $block;
			$bridge->position = 1;

			$this->repos->contentBlockBridges->persist($bridge);
		}

		Assert::same(5, $block->contentBlockBridges->count());
	}

}

runTests(__FILE__, $container);
