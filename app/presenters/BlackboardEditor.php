<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Services\Acl;
use App\Models\Services\Paths;
use App\Presenters\Parameters;
use Nette\Application\UI\Form;
use Nette\Forms\Controls\TextInput;
use Nette\Forms\Controls\UploadControl;
use Nette\Http\FileUpload;


final class BlackboardEditor extends Content
{

	use Parameters\Blackboard;
	use Parameters\Block;
	use Parameters\Schema;

	/**
	 * @var Paths
	 * @inject
	 */
	public $paths;

	public function startup()
	{
		parent::startup();
		$this->loadBlackboard(function() {
			return NULL;
		});
		$this->loadBlock(function() {
			return NULL;
		});
		$this->loadSchema(function() {
			return NULL;
		});

		if ($this->blackboard && $this->block && !$this->block->contains($this->blackboard))
		{
			$this->error();
		}
		if ($this->block && $this->schema && !$this->schema->contains($this->block))
		{
			$this->error();
		}

		if (!($this->user->isAllowed(Acl::ADD_CONTENT) || ($this->blackboard && $this->user->isAllowed($this->blackboard))))
		{
			$this->flashError('acl.denied.blackboard');
			$this->redirect('Homepage:default');
		}
	}

	public function createComponentUpload()
	{
		$form = new Form();
		$form->addUpload('json');
		$form->addUpload('audio');
		$form->addSubmit('save');
		$form->onSuccess[] = [$this, 'onUpload'];
		return $form;
	}

	public function onUpload(Form $form)
	{
		/** @var UploadControl[] $form */
		/** @var FileUpload $json */
		/** @var FileUpload $audio */
		$json = $form['json']->getValue();
		$audio = $form['audio']->getValue();

		$blackboard = new Rme\Blackboard();
		$this->orm->contents->attach($blackboard);
		$blackboard->title = 'Nová nahrávka';
		$blackboard->description = 'popisek'; // TODO
		$blackboard->hidden = FALSE;
		$this->orm->flush();

		$base = $this->paths->getBlackboards() . "/$blackboard->id";
		$json->move("$base.json");
		$audio->move("$base.wav");

		$link = $this->link('BlackboardEditor:default', [
			'blackboardId' => $blackboard->id,
		]);

		$this->sendJson(['redirect' => $link]);
	}

	public function renderDefault()
	{
		$this->template->blackboard = $this->blackboard;
		$this->template->block = $this->block;
		$this->template->schema = $this->schema;

		if ($this->blackboard)
		{
			/** @var self|TextInput[] $this */
			$this['blackboardForm-form-title']->setDefaultValue($this->blackboard->title);
			$this['blackboardForm-form-description']->setDefaultValue($this->blackboard->description);
			$this['blackboardForm-form-visible']->setDefaultValue(!$this->blackboard->hidden);
		}
	}

}
