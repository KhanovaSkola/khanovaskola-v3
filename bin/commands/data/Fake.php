<?php

namespace Bin\Commands\Data;

use App\Models\Orm\Entity;
use App\Models\Orm\Repository;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Block;
use App\Models\Rme\BlockSchemaBridge;
use App\Models\Rme\Comment;
use App\Models\Rme\ContentBlockBridge;
use App\Models\Rme\Path;
use App\Models\Rme\PathsRepository;
use App\Models\Rme\Schema;
use App\Models\Rme\Subject;
use App\Models\Rme\User;
use App\Models\Rme\Video;
use App\Models\Structs\Gender;
use Bin\Commands\Command;
use Bin\Services\FakeSubtitles;
use Bin\Support\DomainProvider;
use Faker\Generator;
use Faker\Provider\cs_CZ\Company;
use Faker\Provider\cs_CZ\Internet;
use Faker\Provider\cs_CZ\Person;
use Nette\DI\Container;
use Symfony\Component\Console\Helper\ProgressHelper;


class Fake extends Command
{

	/**
	 * @var Generator|Person|Internet|DomainProvider|Company $faker
	 */
	protected $faker;

	protected function configure()
	{
		$this->setName('data:fake')
			->setDescription('Populate application with fake data');
	}

	public function invoke(Container $container, Generator $faker, RepositoryContainer $orm)
	{
		$this->faker = $faker;
		$container->addService('subtitles', $container->createInstance(FakeSubtitles::class));

		$users = $this->create(50, User::class, $orm->users, [$this, 'fillUser']);
		$videos = $this->create(20, Video::class, $orm->contents, [$this, 'fillVideo']);
		$this->createComments(10, $videos, $users, $orm->contents);
		$subjects = $this->create(7, Subject::class, $orm->subjects, [$this, 'fillSubject']);
		$this->createSchemasAndBlocks($orm, $subjects, $videos);

		$this->out->writeln('flushing');
		$orm->flush();
		$this->out->writeln('<info>done</info>');
	}

	/**
	 * @param int $count
	 * @param Video[] $videos
	 * @param User[] $users
	 * @param Repository $repo
	 * @throws \Exception
	 */
	protected function createComments($count, $videos, $users, Repository $repo)
	{
		$this->out->writeln(Comment::class);
		/** @var ProgressHelper $progress */
		$progress = $this->getHelperSet()->get('progress');
		$progress->start($this->out, count($videos) * $count);

		foreach ($videos as $video)
		{
			$comments = [];
			for ($i = 0; $i < $count; ++$i)
			{
				$comment = new Comment();
				$comment->author = $this->faker->randomElement($users);
				$comment->text = $this->faker->realText(100);
				$comment->inReplyTo = $this->faker->optional(0.25)->randomElement($comments);
				$video->comments->add($comment);

				$comments[] = $comment;
				$progress->advance();
			}
			$repo->persist($video);
		}
		$progress->finish();
	}

	/**
	 * @param int $count
	 * @param Video[] $videos
	 * @param User[] $users
	 * @param PathsRepository $paths
	 */
	private function createPaths($count, array $videos, array $users, PathsRepository $paths)
	{
		$this->out->writeln(Path::class);

		/** @var ProgressHelper $progress */
		$progress = $this->getHelperSet()->get('progress');
		$progress->start($this->out, $count);

		for ($i = 0; $i < $count; ++$i)
		{
			$path = new Path();
			$path->author = $this->faker->randomElement($users);
			$path->setList($this->faker->randomElements($videos, 7));

			$progress->advance();
			$paths->attach($path);
		}

		$progress->finish();
	}

	/**
	 * @param integer $count
	 * @param string $class
	 * @param Repository $repo
	 * @param callable $fill
	 * @throws \Exception
	 * @return Entity[]
	 */
	protected function create($count, $class, Repository $repo, $fill)
	{
		$this->out->writeln($class);

		/** @var ProgressHelper $progress */
		$progress = $this->getHelperSet()->get('progress');
		$progress->start($this->out, $count);

		$entities = [];
		for ($i = 0; $i < $count; ++$i)
		{
			$entity = new $class;
			$repo->attach($entity);
			$fill($entity);
			$entities[] = $entity;

			$repo->persist($entity);
			$progress->advance();
		}

		$progress->finish();
		return $entities;
	}

	protected function fillUser(User $u)
	{
		$u->gender = $this->faker->randomElement(Gender::getGenders());
		$u->setNominativeAndVocative($this->faker->firstName($u->gender));
		$u->familyName = $this->faker->lastName($u->gender);
		$u->name = "$u->nominative $u->familyName";
		$u->email = $this->faker->email($u->nominative, $u->familyName);
	}

	protected function fillVideo(Video $v)
	{
		$v->title = $this->faker->catchPhrase();
		$v->description = $this->faker->sentence(20);
		$v->youtubeId = 'AuX7nPBqDts';
	}

	protected function fillSubject(Subject $s)
	{
		$s->name = $this->faker->name;
		$s->icon = $this->faker->randomElement([
			'math', 'it', 'zsv', 'chemistry', 'history',
			'natural-studies', 'physics'
		]);
		$s->color = $this->faker->randomElement([
			'blue', 'cyan-dark', 'gold', 'green', 'purple', 'red'
		]);
	}

	/**
	 * @param RepositoryContainer $orm
	 * @param Subject[] $subjects
	 * @param Video[] $videos
	 */
	protected function createSchemasAndBlocks($orm, $subjects, $videos)
	{
		$author = $orm->users->getById(1);

		foreach ($subjects as $subject)
		{
			for ($i = 0; $i < 3; ++$i)
			{
				$schema = new Schema();
				$schema->name = $this->faker->name;
				$schema->subject = $subject;
				$schema->author = $author;

				$orm->schemas->attach($schema);

				for ($k = 0; $k < 10; ++$k)
				{
					$block = new Block();
					$block->name = $this->faker->name;
					$block->author = $author;
					$orm->blocks->attach($block);

					$bridge = new BlockSchemaBridge();
					$bridge->position = $k;
					$bridge->block = $block;
					$bridge->schema = $schema;
					$orm->blockSchemaBridges->attach($bridge);

					for ($l = 0; $l < 7; ++$l)
					{
						$bridge = new ContentBlockBridge();
						$bridge->block = $block;
						$bridge->content = $this->faker->randomElement($videos);
						$bridge->position = $l;
						$orm->contentBlockBridges->attach($bridge);
					}
				}
			}
		}
	}

}
