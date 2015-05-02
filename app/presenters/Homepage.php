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

	public function actionMarathon()
	{
		$this->redirectUrl('http://srazy.info/khanova-skola-prekladatelsky-maraton/5351');
	}

	public function actionPreklad()
	{
		$this->redirectUrl('https://forum.khanovaskola.cz/t/pro-nove-korektory-navrh/701');
	}

}
