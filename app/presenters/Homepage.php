<?php

namespace App\Presenters;

use App\Models\Rme;


final class Homepage extends Presenter
{

	public function actionDefault()
	{
		dump($this->orm->blocks->getById(1)->list);

//		$block = new Rme\Block();
//		$block->author = $this->getUserEntity();
//		$block->name = 'test block';
//		$block->schemas = [];
//		$block->list = [
//			$this->orm->videos->getById(1),
//			$this->orm->videos->getById(2),
//			$this->orm->videos->getById(4),
//			$this->orm->videos->getById(8),
//			$this->orm->videos->getById(16),
//		];
//		$this->orm->blocks->attach($block);
//		$this->orm->flush();
//		dump($this->orm->blocks->findAll()->fetchAll());
	}

}
