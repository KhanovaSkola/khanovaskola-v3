<?php

namespace Clevis\Skeleton\Orm;

use Nette\Object;
use Orm\MetaData;
use Orm\RelationshipMetaDataToMany;
use Orm\InvalidArgumentException;


/**
 * Uchovává metadata o vztazích entit a doplňuje metadata entit
 */
class EntityRelationsRegistry extends Object
{

	/** @var array ($targetClass => array($relatedClass)) */
	private $registry = array();

	/** @var array ($targetClass => array($relatedClass => array(...))) */
	private $relations = array();


	/**
	 * Registruje existenci vazby mezi entitami
	 *
	 * @param string - rozšiřující entita
	 * @param string - rozšiřovaná entita
	 */
	public function addRelation($relatedEntityClass, $targetEntityClass)
	{
		if (empty($this->registry[$targetEntityClass]) || !in_array($relatedEntityClass, $this->registry[$targetEntityClass]))
		{
			$this->registry[$targetEntityClass][] = $relatedEntityClass;
		}
	}


	/**
	 * Přidává k metadatům entity rozšiřující vazby
	 *
	 * @param string
	 * @param MetaData
	 * @return MetaData
	 */
	public function completeMetaData($targetEntityClass, MetaData $metaData)
	{
		// kompletujeme relace i pro všechny předky entity
		$classes = $this->getClasses($targetEntityClass);
		$relations = array();
		foreach ($classes as $class)
		{
			$relations = $relations + $this->getRelations($class);
		}

		$properties = $metaData->toArray();

		// 0 type
		// 1 property
		// 2 relationType
		// 3 repositoryClass
		// 4 opositProperty
		foreach ($relations as $data)
		{
			if (isset($properties[$data[1]]))
			{
				continue;
			}

			if ($data[2] === MetaData::OneToMany)
			{
				$metaData->addProperty($data[1], $data[0])
					->setOneToMany($data[3], $data[4]);
			}
			elseif ($data[2] === MetaData::ManyToMany)
			{
				$metaData->addProperty($data[1], $data[0])
					->setManyToMany($data[3], $data[4], RelationshipMetaDataToMany::MAPPED_THERE);
			}
			else
			{
				throw new InvalidArgumentException("Pouze relace '1:m' a 'm:m' může být přiřazdena entitě rozšiřijící entitou. Uvedenou relaci '$data[2]' nelze přidat.");
			}
		}

		return $metaData;
	}

	/**
	 * Vrací relace třídy
	 *
	 * @param string
	 * @return array
	 */
	private function getRelations($targetClass)
	{
		if (!isset($this->relations[$targetClass]))
		{
			$this->relations[$targetClass] = $this->loadRelations($targetClass);
		}

		return $this->relations[$targetClass];
	}

	/**
	 * Načítá relace pro jednu třídu
	 *
	 * @param string
	 * @return array
	 */
	private function loadRelations($targetClass)
	{
		$res = array();
		if (empty($this->registry[$targetClass]))
		{
			return $res;
		}

		foreach ($this->registry[$targetClass] as $relatedClass)
		{
			/// fn exists?
			$data = call_user_func(array($relatedClass, 'getExtendingRelations'));
			foreach ($data as $class => $relations)
			{
				/// zahazuje co se nehodí. kešovat?
				if ($class !== $targetClass) continue;

				foreach ($relations as $relation)
				{
					$res[] = $relation;
				}
			}
		}

		return $res;
	}


	/**
	 * Vrací předky třídy
	 *
	 * @param string
	 * @return array
	 */
	private function getClasses($class)
	{
		$classes = array($class);
		while ($class = get_parent_class($class))
		{
			$i = class_implements($class);
			if (!isset($i['Orm\IEntity']))
			{
				break;
			}
			$classes[] = $class;
			if ($class === 'Orm\Entity')
			{
				break;
			}
		}
		return array_reverse($classes);
	}

}
