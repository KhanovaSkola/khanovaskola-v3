<?php

namespace App\Components\Forms;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\StudentInvite;
use App\Models\Rme\Token;
use App\Models\Rme\Tokens\LinkExistingStudent;
use App\Models\Rme\Tokens\LinkNewStudent;
use App\Models\Rme\User;
use App\Models\Services\Queue;
use App\Models\Structs\EntityPointer;
use App\Models\Tasks\SendMailTask;
use Nette\Forms\Container;


class LinkStudents extends Form
{

	/**
	 * @var Queue
	 * @inject
	 */
	public $queue;

	/**
	 * @var RepositoryContainer
	 * @inject
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
		$failedEmails = [];
		foreach ($emails as $email)
		{
			if ($this->orm->unsubscribes->getByEmail($email))
			{
				$failedEmails[] = $email;
				continue;
			}
			$this->inviteUser($teacher, $email);
		}

		$this->orm->flush();

		$this->flashStatus($failedEmails, $emails);
		$this->presenter->redirect('Profile:default');
	}

	/**
	 * @param string[] $failedEmails
	 * @param string[] $emails
	 */
	protected function flashStatus(array $failedEmails, array $emails)
	{
		if (count($failedEmails) === count($emails) && count($failedEmails) === 1)
		{
			$this->presenter->flashError('mentor.linkStudent.failOne', [
				'email' => $failedEmails[0],
			]);
		}
		else if (count($failedEmails) === count($emails))
		{
			$this->presenter->flashError('mentor.linkStudent.failAll', [
				'emails' => implode(', ', $failedEmails),
			]);
		}
		else if (count($failedEmails) === 1)
		{
			$this->presenter->flashError('mentor.linkStudent.failPartialOne', [
				'emails' => implode(', ', $failedEmails),
			]);
		}
		else if ($failedEmails)
		{
			$this->presenter->flashError('mentor.linkStudent.failPartial', [
				'emails' => implode(', ', $failedEmails),
			]);
		}
		else if (count($emails) === 1)
		{
			$this->presenter->flashInfo('mentor.linkStudent.awaitApprovalOne');
		}
		else
		{
			$this->presenter->flashInfo('mentor.linkStudent.awaitApproval');
		}
	}

	/**
	 * @param User $teacher
	 * @param string $email
	 * @throws \Exception
	 */
	protected function inviteUser(User $teacher, $email)
	{
		$student = $this->getOrCreateUser($email);

		if ($student->registered)
		{
			$token = LinkExistingStudent::createFromUser($student);
			$template = 'mentor.linkStudent.existing';
		}
		else
		{
			$token = LinkNewStudent::createFromUser($student);
			$template = 'mentor.linkStudent.new';
		}

		$invite = new StudentInvite($teacher, $student);
		$token->studentInvite = $invite;

		$this->orm->tokens->persist($token);
		$this->orm->flush(); // prevent race condition with queue

		$task = new SendMailTask($template, $student, [
			'teacher' => new EntityPointer($teacher),
			'invitee' => new EntityPointer($student),
			'token' => new EntityPointer($token),
			'unsafe' => $token->getUnsafe(),
		]);

		$teacher->studentInvitesSent->add($invite);

		$this->queue->enqueue($task);
	}

	/**
	 * @param string $email
	 * @return User
	 */
	protected function getOrCreateUser($email)
	{
		$student = $this->orm->users->getByEmail($email);
		if (!$student)
		{
			$student = new User();
			$student->registered = FALSE;
			$student->email = $email;

			$this->orm->users->attach($student);
		}
		return $student;
	}

}
