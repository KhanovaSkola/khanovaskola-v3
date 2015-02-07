<?php

namespace App\Components\Forms;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\StudentInvite;
use App\Models\Rme\Tokens\LinkExistingStudent;
use App\Models\Rme\Tokens\LinkNewStudent;
use App\Models\Rme\User;
use App\Models\Services\Queue;
use App\Models\Structs\EntityPointer;
use App\Models\Tasks\SendMailTask;
use Kdyby\RabbitMq\Connection;
use Nette\Forms\Container;


class LinkStudents extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	/**
	 * @var Connection
	 * @inject
	 */
	public $queue;

	public function setup()
	{
		$emails = $this->addDynamic('emails', function(Container $container) {
			$container->addText('email')
				->addCondition($this::FILLED)
				->addRule($this::EMAIL, 'email.wrong');
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

		$awaitingEmails = [];
		$ignoredEmails = [];
		foreach ($teacher->studentInvitesSent as $invite)
		{
			if ($invite->accepted)
			{
				$ignoredEmails[] = $invite->student->email;
			}
			else
			{
				$awaitingEmails[] = $invite->student->email;
			}
		}

		$fails = (object) [
			'unsubscribed' => [],
			'awaiting' => [],
		];
		$ok = [];
		foreach ($emails as $email)
		{
			if ($this->orm->unsubscribes->getByEmail($email))
			{
				$fails->unsubscribed[] = $email;
			}
			else if (in_array($email, $awaitingEmails))
			{
				$fails->awaiting[] = $email;
			}
			else if (in_array($email, $ignoredEmails))
			{
				// student already accepted invite from this teacher
				// but there is no point in informing teacher about it
			}
			else
			{
				$this->inviteUser($teacher, $email);
				$ok[] = $email;
			}
		}

		$this->orm->flush();

		$this->iLog('form.linkStudents', [
			'fails' => $fails,
			'ok' => $ok,
		]);
		$this->flashStatus($fails, $emails);
		$this->presenter->redirect('Profile:default');
	}

	/**
	 * @param \stdClass $fails
	 * @param string[] $emails
	 */
	protected function flashStatus($fails, array $emails)
	{
		if (count($fails->unsubscribed) === count($emails) && count($fails->unsubscribed) === 1)
		{
			$this->presenter->flashError('mentor.linkStudent.failOne', [
				'email' => $fails->unsubscribed[0],
			]);
		}
		else if (count($fails->unsubscribed) === count($emails))
		{
			$this->presenter->flashError('mentor.linkStudent.failAll', [
				'emails' => implode(', ', $fails->unsubscribed),
			]);
		}
		else if (count($fails->unsubscribed) === 1)
		{
			$this->presenter->flashError('mentor.linkStudent.failPartialOne', [
				'emails' => implode(', ', $fails->unsubscribed),
			]);
		}
		else if ($fails->unsubscribed)
		{
			$this->presenter->flashError('mentor.linkStudent.failPartial', [
				'emails' => implode(', ', $fails->unsubscribed),
			]);
		}

		if ($fails->awaiting)
		{
			$this->presenter->flashInfo('mentor.linkStudent.alreadySent' . (count($fails->awaiting) === 1 ? 'One' : ''), [
				'emails' => implode(', ', $fails->awaiting),
			]);
		}

		if (!$fails->unsubscribed && !$fails->awaiting)
		{
			$this->presenter->flashInfo('mentor.linkStudent.awaitApproval' . (count($emails) === 1 ? 'One' : ''));
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


		$teacher->studentInvitesSent->add($invite);

		$producer = $this->queue->getProducer('mail');
		$producer->publish(serialize([
			'template' => $template,
			'recipient' => new EntityPointer($student),
			'teacher' => new EntityPointer($teacher),
			'token' => new EntityPointer($token),
			'unsafe' => $token->getUnsafe(),
		]));
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
