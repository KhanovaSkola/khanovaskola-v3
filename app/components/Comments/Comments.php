<?php

namespace App\Components;

use App\Rme\Comment;
use App\Rme\RepositoryContainer;
use App\Rme\User;
use App\Rme\Video;
use App\Services\Translator;
use Nette\Application\UI\ITemplateFactory;


class Comments extends Control
{

	/** @var Video */
	private $video;

	/** @var User */
	private $user;

	/** @var RepositoryContainer */
	private $orm;

	public function __construct(Translator $translator, ITemplateFactory $templateFactory, Video $video, User $user, RepositoryContainer $orm)
	{
		parent::__construct($translator, $templateFactory);
		$this->video = $video;
		$this->user = $user;
		$this->orm = $orm;
	}

	public function createComponentComment($name)
	{
		$form = new Form($this, $name);

		$form->addTextArea('text');

		$form->addSubmit();
		$form->onSuccess[] = $this->onSuccessComment;

		return $form;
	}

	public function onSuccessComment(Form $form)
	{
		$comment = new Comment();
		$comment->video = $this->video;
		$comment->author = $this->user;
		$comment->text = $form['text']->value;

		$this->orm->comments->attach($comment);
		$this->orm->flush();
		$this->flashSuccess('added');
		$this->redirect('this');
	}

	protected function renderDefault(Video $video)
	{
		$this->template->comments = $video->comments;
	}

}
