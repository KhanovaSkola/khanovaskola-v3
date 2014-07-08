<?php

namespace App\Components\Forms;

use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Queue;
use App\Models\Tasks\EntityPointer;
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

		$args = [
			'teacher' => new EntityPointer($this->presenter->getUserEntity()),
		];
		foreach ($emails as $email)
		{
			if ($user = $this->orm->users->getByEmail($email))
			{
				$task = new SendMailTask('mentor.linkStudent.existing', "$user->name <$user->email>", $args + [
					'invitee' => new EntityPointer($user),
				]);
			}
			else
			{
				$task = new SendMailTask('mentor.linkStudent.new', $email, $args + [
				]);
			}

			$this->queue->enqueue($task);
		}

		$this->presenter->flashSuccess('mentor.linkStudent.awaitApproval');
		$this->presenter->redirect('Profile:default');
	}

}
