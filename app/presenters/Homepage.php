<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Services\Discourse;


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

    // Show link to CS-KA at the top
    $this->template->showKALink = true;
	}

	public function actionMarathon()
	{
		$this->redirectUrl('http://srazy.info/maratonks/');
	}

	public function actionPreklad()
	{
		$this->redirectUrl('https://forum.khanovaskola.cz/t/pro-nove-korektory-navrh/701');
	}

}
