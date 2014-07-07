<?php

namespace App\Components\Controls;

use App\Components\Control;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\User;
use App\Models\Rme\Video;


class Comments extends Control
{

	/** @var Video */
	private $video;

	/** @var User */
	private $user;

	/** @var RepositoryContainer */
	private $orm;

	public function __construct(Video $video, User $user, RepositoryContainer $orm)
	{
		parent::__construct();
		$this->video = $video;
		$this->user = $user;
		$this->orm = $orm;
	}

	//	public function createComponentComment($name)
	//	{
	//		$form = new Form($this, $name);
	//
	//		$form->addTextArea('text');
	//
	//		$form->addSubmit();
	//		$form->onSuccess[] = $this->onSuccessComment;
	//
	//		return $form;
	//	}
	//
	//	public function onSuccessComment(Form $form)
	//	{
	//		$comment = new Comment();
	//		$comment->video = $this->video;
	//		$comment->author = $this->user;
	//		$comment->text = $form['text']->value;
	//
	//		$this->orm->comments->attach($comment);
	//		$this->orm->flush();
	//		$this->flashSuccess('added');
	//		$this->redirect('this');
	//	}

	protected function renderDefault(Video $video)
	{
		$this->template->comments = $video->comments;
	}

}
