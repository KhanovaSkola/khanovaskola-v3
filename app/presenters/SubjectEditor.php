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

		if (!$this->user->isAllowed($this->subject))
		{
			$this->flashError('acl.denied.subject');
			$this->redirect('Homepage:default');
		}
	}

	public function renderDefault()
	{
		if ($this->subject)
		{
			/** @var TextBase[] $form */
			$form = $this['subjectForm-form'];

			$form['title']->setDefaultValue($this->subject->title);
			$form['description']->setDefaultValue($this->subject->description);
			$form['editors']->setDefaultValue($this->subject->editors->get()->fetchPairs('id', 'id'));
		}

		$this->template->schemas = $this->orm->schemas->findAll();
		$this->template->subject = $this->subject;
	}

}
