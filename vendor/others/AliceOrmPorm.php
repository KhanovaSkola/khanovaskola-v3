<?php

/*
 * This file is part of the Alice package.
 *
 * (c) Nelmio <hello@nelm.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nelmio\Alice\ORM;

use App\Rme\RepositoryContainer;
use Nelmio\Alice\ORMInterface;


class Porm implements ORMInterface
{
    protected $orm;
    protected $map;

    public function __construct(RepositoryContainer $orm, $map)
    {
        $this->orm = $orm;
        $this->map = $map;
    }

	/**
	 * @param string|object $class
	 * @return \Orm\IRepository
	 * @throws \Exception
	 */
	protected function getRepo($class)
	{
		if (is_object($class))
		{
			$class = get_class($class);
		}
		$class = strToLower($class);

		if (!isset($this->map[$class]))
		{
			throw new \Exception("specify repository name of '$class' in persitor map");
		}
		$repo = $this->map[$class];
		return $this->orm->$repo;
	}

    public function persist(array $objects)
    {
        foreach ($objects as $object)
        {
	        $this->getRepo($object)->attach($object);
        }

	    $this->orm->flush();
    }

    public function find($class, $id)
    {
        $entity = $this->getRepo($class)->getById($class, $id);

        if (!$entity)
        {
            throw new \UnexpectedValueException('Entity with Id ' . $id . ' and Class ' . $class . ' not found');
        }

        return $entity;
    }
}
