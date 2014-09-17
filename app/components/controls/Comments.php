<?php

namespace App\Components\Controls;

use App\Components\Control;
use App\Models\Rme\Content;


class Comments extends Control
{

	/**
	 * @var Content
	 */
	protected $content;

	public function __construct(Content $content)
	{
		parent::__construct();
		$this->content = $content;
	}

	/**
	 * @return Content
	 */
	public function getContent()
	{
		return $this->content;
	}

	protected function renderDefault()
	{
		$this->template->comments = $this->content->comments;
	}

}
