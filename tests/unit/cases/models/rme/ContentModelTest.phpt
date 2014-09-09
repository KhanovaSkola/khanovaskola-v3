<?php

namespace Tests\Cases\Unit;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Block;
use App\Models\Rme\BlockLink;
use App\Models\Rme\Schema;
use App\Models\Rme\User;
use App\Models\Structs\Gender;
use Tester\Assert;
use Tests\TestCase;


$container = require __DIR__ . '/../../../bootstrap.php';

class ContentModelTest extends TestCase
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $repos;

	/**
	 * There are no wild errors while linking those entities
	 * and when persisting.
	 */
	public function testSchema()
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

			$link = new BlockLink();
			$link->block = $block;
			$link->schema = $schema;
			$link->position = 1;

			$this->repos->blockLinks->persist($link);
		}

		Assert::same(5, $schema->blockLinks->count());
	}

}

runTests(__FILE__, $container);
