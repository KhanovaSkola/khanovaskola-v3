<?php

namespace App\Presenters;

use App\Presenters\Parameters;
use Nette\Forms\Controls\TextBase;


final class SubjectEditor extends Presenter
{

	use Parameters\Subject;

	public function startup()
	{
		parent::startup();
		$this->loadSubject();
	}

	public function renderDefault()
	{
		if (!$this->user->isAllowed($this->subject))
		{
			$this->flashError('acl.denied.subject');
			$this->redirect('Homepage:default');
		}
		if ($this->subject)
		{
			/** @var self|TextBase[] $this */
			$this['subjectForm-form-title']->setDefaultValue($this->subject->title);
			$this['subjectForm-form-description']->setDefaultValue($this->subject->description);
		}

		$this->template->subject = $this->subject;
	}

}
