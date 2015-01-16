<?php

namespace App\Presenters;


final class Subjects extends Presenter
{

	public function renderDefault($teacher = FALSE, $parent = FALSE)
	{
		$this->setCacheControlPublic();

		if ($teacher)
		{
			$this->flashInfo('subjects.notYet.teacher');
		}
		else if ($parent)
		{
			$this->flashInfo('subjects.notYet.parent');
		}

		// group by 5 for easier rendering
		$groups = [];
		$group = [];
		foreach ($this->orm->subjects->findAll() as $subject)
		{
			$group[] = $subject;
			if (count($group) === 5)
			{
				$groups[] = $group;
				$group = [];
			}
		}
		if ($group)
		{
			$groups[] = $group;
		}

		$this->template->groupedSubjects = $groups;
	}

}
