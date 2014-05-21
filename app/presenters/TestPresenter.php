<?php

namespace App\Presenters;

use Nette\Http\IResponse;


final class TestPresenter extends BasePresenter
{

	public function renderE404()
	{
		$this->error(NULL, IResponse::S404_NOT_FOUND);
	}

	public function renderDefault()
	{
		$this->flashSuccess('test.flash.success');
		$this->flashInfo('test.flash.info');
		$this->flashError('test.flash.error');
	}

}
