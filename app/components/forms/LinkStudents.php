<?php

namespace App\Components\Forms;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\StudentInvite;
use App\Models\Rme\Token;
use App\Models\Services\Queue;
use App\Models\Structs\EntityPointer;
use App\Models\Tasks\SendMailTask;
use Nette\Forms\Container;


class LinkStudents extends Form
{

	/**
	 * @var Queue @inject
	 */
	public $queue;

	/**
	 * @var RepositoryContainer @inject
	 */
	public $orm;

	public function setup()
	{
		$emails = $this->addDynamic('emails', function(Container $container) {
			$container->addText('email')
				->addCondition($this::FILLED)
				->addRule($this::EMAIL); // TODO translate error message
		});
		for ($i = 0; $i < 5; ++$i)
		{
			$emails->createOne($i);
		}

		$this->addSubmit();
	}

	public function onSuccess()
	{
		$emails = [];
		foreach ($this->values->emails as $node)
		{
			if ($node->email)
			{
				$emails[] = $node->email;
			}
		}
		$emails = array_unique($emails);

		$teacher = $this->presenter->getUserEntity();
		$args = [
			'teacher' => new EntityPointer($teacher),
		];
		foreach ($emails as $email)
		{
			if ($student = $this->orm->users->getByEmail($email))
			{
				$invite = new StudentInvite($teacher, $student);

				$token = Token::createFromUser(Token::TYPE_STUDENT_INVITE, $student);
				$token->studentInvite = $invite;

				$this->orm->tokens->persist($token);
				$this->orm->flush(); // prevent race condition with queue

				$task = new SendMailTask('mentor.linkStudent.existing', "$student->name <$student->email>", $args + [
					'invitee' => new EntityPointer($student),
					'token' => new EntityPointer($token),
					'unsafe' => $token->getUnsafe(),
				]);
			}
			else
			{
				$task = new SendMailTask('mentor.linkStudent.new', $email, $args);
				$invite = new StudentInvite($teacher, $email);
			}

			$teacher->studentInvitesSent->add($invite);

			$this->queue->enqueue($task);
		}

		$this->orm->flush();
		$this->presenter->flashSuccess('mentor.linkStudent.awaitApproval');
		$this->presenter->redirect('Profile:default');
	}

}
