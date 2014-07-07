<?php

namespace Tests\Cases\Unit;

use App\Models\Orm\RepositoryContainer;
use Tester\Assert;
use Tests\TestCase;


$container = require __DIR__ . '/../../bootstrap.php';

class DummyTest extends TestCase
{

	/**
	 * @var RepositoryContainer @inject
	 */
	public $repos;

	public function testSomething()
	{
		echo "something\n";
		Assert::same(TRUE, TRUE);
	}

}

runTests(__FILE__, $container);
