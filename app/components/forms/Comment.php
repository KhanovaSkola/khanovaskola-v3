<?php

namespace App\Components\Forms;

use App\Components\Controls\Comments;
use App\Components\FormControl;
use App\InvalidStateException;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use App\Presenters\Content;


class Comment extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	/**
	 * @var Rme\Content
	 */
	public $content;

	public function setup()
	{
		$this->addTextArea('text')
			->addRule($this::FILLED, 'text.missing')
			->addRule($this::MIN_LENGTH, 'text.short', 15);

		$this->addHidden('replyTo');

		$this->addSubmit();
	}

	protected function attached($presenter)
	{
		parent::attached($presenter);

		if (! $this->presenter instanceof Content)
		{
			throw new InvalidStateException;
		}

		/** @var FormControl $fc */
		$fc = $this->parent;
		if (! $fc->parent instanceof Comments)
		{
			throw new InvalidStateException;
		}

		$this->content = $fc->parent->getContent();
	}

	public function onSuccess()
	{
		$v = $this->getValues();

		/** @var Content $presenter */
		$presenter = $this->presenter;

		$comment = new Rme\Comment();
		$comment->text = $v->text;
		$comment->content = $this->content;

		$this->orm->comments->attach($comment);
		$comment->author = $presenter->getUserEntity();

		if ($v->replyTo)
		{
			$replyTo = $this->orm->comments->getById($v->replyTo);
			if (!$replyTo || !$this->content->comments->has($replyTo))
			{
				$this->addError('invalid reply');
			}
			$comment->inReplyTo = $replyTo;
		}

		$this->orm->comments->attach($comment);
		$this->orm->flush();

		$this->iLog('form.comment');
		$presenter->flashSuccess('added');
		$presenter->redirect('this');
	}
}
