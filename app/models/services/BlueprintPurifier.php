<?php

namespace App\Models\Services;


class BlueprintPurifier extends HtmlPurifier
{

	public static function getAllowedElements()
	{
		return ['span'];
	}

	public static function getAllowedAttributes()
	{
		return ['span.class'];
	}

}
