<?php

namespace Clevis\Skeleton\Orm;

use Orm;


/**
 * Formátuje jména tabulek
 */
class SqlConventional extends Orm\SqlConventional
{

	/** @var string[] */
	private $tableCache = array();


	/**
	 * Formátuje jména tabulek (slova oddělená podtržítky, lowercase)
	 *
	 * @param Orm\IRepository
	 * @return string
	 */
	public function getTable(Orm\IRepository $repository)
	{
		$class = get_class($repository);
		if (!isset($this->tableCache[$class]))
		{
			// odstraňujeme namespace a slovo "Repository"
			$pos = strrpos($class, '\\');
			$name = substr($class, $pos + 1, strlen($class) - $pos - 11);

			// převádíme cammel case na snake case
			$this->tableCache[$class] = strtolower(
				preg_replace('/([A-Z]+)([A-Z])/','\1_\2',
					preg_replace('/([a-z\d])([A-Z])/','\1_\2', $name)));
		}

		return $this->tableCache[$class];
	}

}
