<?php

namespace App\Presenters;


class ReportBridge extends Presenter
{

	public function actionUpdateVideo($youtubeId)
	{
		$video = $this->orm->contents->getVideoByYoutubeId($youtubeId);
		if (!$video)
		{
			$this->error();
		}

		$video->forceSubtitleUpdate();
		$this->orm->flush();

		$this->sendJson(['result' => 'success']);
	}

}
