<?php

namespace App\Models\Services;


class DiscoursePurifier extends HtmlPurifier
{

	public static function getAllowedElements()
	{
		return ['a', 'b', 'i', 'p'];
	}

	public static function getAllowedAttributes()
	{
		return [];
	}

}
