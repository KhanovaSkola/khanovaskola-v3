<?php

namespace Commands\Db;

use App\Rme\Blueprint;
use App\Rme\Comment;
use App\Rme\Gist;
use App\Rme\Path;
use App\Rme\RepositoryContainer;
use App\Rme\User;
use App\Rme\Video;
use Commands\Command;
use Faker\Factory;
use Faker\Generator;
use Faker\Provider\cs_CZ\Internet;
use Faker\Provider\cs_CZ\Person;
use Faker\Provider\cs_CZ\Text;
use Faker\UniqueGenerator;
use Mikulas\Faker\Provider\Custom;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class FillTask extends Command
{

	public function setup()
	{
		$this->setDescription('Fill database with fake data');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$output->writeln('<info>Generating random data</info>');

		/** @var RepositoryContainer $orm */
		$orm = $this->container->getService('orm');

		/** @var Generator|Person|Internet|Custom|Text $faker */
		$faker = Factory::create('cs_CZ');
		$faker->addProvider(new Custom($faker));

		/** @var UniqueGenerator|Internet|Custom $unique */
		$unique = $faker->unique();

		$output->writeln('<info>creating users</info>');
		$users = [];
		for ($i = 0; $i < 100; ++$i)
		{
			$user = new User();
			$user->gender = $faker->randomElement([User::GENDER_MALE, User::GENDER_FEMALE]);
			$user->familyName = $faker->lastName($user->gender);
			$firstName = $faker->firstName($user->gender);
			$user->name = "$firstName {$user->familyName}";
			$user->email = $unique->email();
			$orm->users->attach($user);
			$user->setNominativeAndVocative($firstName);
			$users[] = $user;
		}

		$output->writeln('<info>creating blueprints</info>');
		$content = [];
		$blueprints = [];
		for ($i = 0; $i < 100; ++$i)
		{
			$bp = new Blueprint();
			$bp->title = $unique->contentTitle();
			$bp->description = $faker->realText(150);
			$bp->question = $faker->exerciseQuestion();
			$bp->answer = '2';
			$max = $faker->randomDigit();
			for ($k = 0; $k < $max; ++$k)
			{
				$bp->addHint($faker->realText(80));
			}
			$orm->blueprints->attach($bp);
			$blueprints[] = $bp;
			$content[] = $bp;
		}

		$output->writeln('<info>creating videos</info>');
		$videos = [];
		for ($i = 0; $i < 100; ++$i)
		{
			$video = new Video();
			$video->title = $unique->contentTitle();
			$video->description = $faker->realText(150);
			$video->youtubeId = $unique->youtubeId();
			$orm->videos->attach($video);
			$videos[] = $video;
			$content[] = $video;
		}

		$gist = new Gist();
		$gist->name = 'test';
		$orm->gists->attach($gist);
		$gist->text = $faker->realText(800);

		$orm->flush();

		$output->writeln('<info>creating paths</info>');
		for ($i = 0; $i < 20; ++$i)
		{
			$path = new Path();
			$path->author = $users[array_rand($users)];
			$list = [];
			$ignore = [];
			$max = mt_rand(5, 20);
			while (count($list) != $max)
			{
				$e = $content[array_rand($content)];
				$key = get_class($e) . "|{$e->id}";
				if (!isset($ignore[$key]))
				{
					$ignore[$key] = TRUE;
					$list[] = $e;
				}
			}
			$path->list = $list;
			$orm->paths->attach($path);
		}
		$orm->flush();

		$output->writeln('<info>creating comments</info>');
		$comments = [];
		for ($i = 0; $i < 500; ++$i)
		{
			$comment = new Comment();
			$comment->text = $faker->realText(150);
			$comment->author = $users[array_rand($users)];
			if ($comments && mt_rand(0, 100) > 60)
			{
				$comment->inReplyTo = $comments[array_rand($comments)];
				$comment->video = $comment->inReplyTo->video;
			}
			else
			{
				$comment->video = $videos[array_rand($videos)];
			}
			$comments[] = $comment;
			$orm->flush();
		}
	}

}
