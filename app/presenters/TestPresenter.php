<?php

namespace App\Presenters;


final class TestPresenter extends BasePresenter
{

	public function actionDefault()
	{
		$this->flashSuccess('test.flash.success');
		$this->flashInfo('test.flash.info');
		$this->flashError('test.flash.error');
	}

}
