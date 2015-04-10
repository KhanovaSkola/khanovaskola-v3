<?php

namespace App\Presenters;

use App\Models\Rme;


final class Homepage extends Presenter
{

	public function renderDefault()
	{
		$subjects = $this->orm->subjects->findAllButOldWeb()->applyLimit(6)->fetchAll();
		$this->template->firstSubject = array_shift($subjects);
		$this->template->secondThirdSubject = array_filter([array_shift($subjects), array_shift($subjects)]);
		$this->template->moreSubjects = array_filter([array_shift($subjects), array_shift($subjects), array_shift($subjects)]);

		$videoCount = $this->orm->contents->findAllVideos()->count();
		$precision = 100;
		$this->template->videoCount = round($videoCount / $precision) * $precision;
	}

}
