<?php

namespace Mikulas\Diagnostics;

use Monolog\Handler\StreamHandler;


class FlushingStreamHandler extends StreamHandler
{

	protected function write(array $record)
	{
		parent::write($record);
		if (is_resource($this->stream))
		{
			fflush($this->stream);
		}
	}

}
