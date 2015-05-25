<?php

namespace App\Models\Services\Consumers;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Blackboard;
use App\Models\Services\BlackboardPreview as Generator;
use App\Models\Services\Paths;


class BlackboardPreview extends Consumer
{

	/**
	 * @var Generator
	 */
	private $generator;

	/**
	 * @var Paths
	 */
	private $paths;

	public function __construct(RepositoryContainer $orm, Paths $paths, Generator $generator)
	{
		parent::__construct($orm);
		$this->generator = $generator;
		$this->paths = $paths;
	}

	public function invoke(array $args)
	{
		/** @var Blackboard $bb */
		$bb = $args['blackboard'];

		$file = $this->paths->getPreviews() . "/$bb->id.png";
		$this->generator->generate($bb, $file);
		$bb->preview = "/data/preview/$bb->id.png";

		$this->orm->flush();
	}
}
