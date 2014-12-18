<?php

namespace App\Presenters;

use App\Models\Services\Acl;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\Utils\Json;


final class SubjectsEditor extends Presenter
{

	/**
	 * @var IStorage
	 * @inject
	 */
	public $storage;

	public function renderDefault()
	{
		if (!$this->user->isAllowed(Acl::ALL))
		{
			$this->flashError('acl.denied.subjects');
			$this->redirect('Homepage:default');
		}

		$this->template->subjects = $this->orm->subjects->findAll();
	}

	public function handleSave($payload)
	{
		$data = Json::decode($payload);

		foreach ($data as $subjectId => $values)
		{
			$subject = $this->orm->subjects->getById($subjectId);
			$subject->setValues($values);
		}

		$this->orm->flush();

		$cache = new Cache($this->storage);
		$cache->clean([
			Cache::TAGS => ['header'],
		]);

		$this->redirect('this');
	}

}
