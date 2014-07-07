<?php

namespace Bin\Commands\Data;

use App\Models\Orm\Entity;
use App\Models\Orm\Repository;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Comment;
use App\Models\Rme\User;
use App\Models\Rme\Video;
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

	/** @var Generator|Person|Internet|DomainProvider|Company $faker */
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
		$videos = $this->create(20, Video::class, $orm->videos, [$this, 'fillVideo']);
		$this->createComments(10, $videos, $users, $orm->videos);

		$this->out->writeln('<info>done</info>');
		$orm->flush();
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
	 * @param integer $count
	 * @param string $class
	 * @param Repository $repo
	 * @param callable $fill
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
		$u->gender = $this->faker->randomElement([$u::GENDER_MALE, $u::GENDER_FEMALE]);
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

}
