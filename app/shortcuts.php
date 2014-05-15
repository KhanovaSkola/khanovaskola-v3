<?php

function d()
{
	$args = [];
	foreach (func_get_args() as $arg)
	{
		if ($arg instanceof \Orm\Entity)
		{
			$args[] = array_merge(['__class' => get_class($arg)], $arg->toArray());
		}
		else
		{
			$args[] = $arg;
		}
	}

	return call_user_func_array('dump', $args);
}
