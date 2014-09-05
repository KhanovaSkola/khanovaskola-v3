<?php

function adminer_object()
{

	class AdminerSoftware extends Adminer
	{

		public function name()
		{
			return 'Khanova škola';
		}

		public function database()
		{
			// database name, will be escaped by Adminer
			return 'khanovaskola';
		}

	}

	return new AdminerSoftware;
}

require __DIR__ . '/../../../vendor/mikulas/adminer-package/adminer.php';
