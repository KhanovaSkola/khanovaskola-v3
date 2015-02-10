<?php

namespace App\Models\Services;


class BlueprintPurifier extends HtmlPurifier
{

	public static function getAllowedElements()
	{
		return ['span', 'img'];
	}

	public static function getAllowedAttributes()
	{
		return ['span.class', 'img.src', 'img.height'];
	}

}
