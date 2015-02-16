<?php

namespace App\Models\Structs\Exercises;


class DragToBoxExercise extends ScalarExercise
{

	/**
	 * @var string
	 */
	protected $image;

	/**
	 * @var int
	 */
	protected $imageCount;

	/**
	 * @param string $image
	 */
	public function setImage($image)
	{
		$this->image = $image;
	}

	/**
	 * @param int $imageCount
	 */
	public function setImageCount($imageCount)
	{
		$this->imageCount = $imageCount;
	}

	/**
	 * @return string
	 */
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * @return int
	 */
	public function getImageCount()
	{
		return $this->imageCount;
	}

}
