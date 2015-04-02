<?php

namespace App\Models\Rme;

use App\Models\Orm\TitledEntity;
use Orm\ManyToMany as MtM;
use Orm\OneToMany as OtM;


/**
 * @property OtM|Schema[] $schemas {1:m schemas $subject}
 * @property string       $color hex
 * @property string       $icon
 * @property int          $position
 * @property MtM|User[]   $editors {m:m users $subjectsEdited}
 * @property bool         $fromOldWeb {default false}
 * @property bool         $hidden {default false}
 */
class Subject extends TitledEntity
{

	public function getMenuItems()
	{
		return $this->schemas->get()
			->orderBy('position');
	}

	public function getLargeMenuItems()
	{
		return $this->schemas->get()
			->orderBy('position')
			->findBy(['from_old_web' => 'f'])
			->applyLimit(3);
	}

	public function getLargeMenuItemsSupplement()
	{
		$a = $this->schemas->get()
			->orderBy('position')
			->findBy(['from_old_web' => 'f'])
			->applyLimit(NULL, 3);
		$b = $this->schemas->get()
			->orderBy('position')
			->findBy(['from_old_web' => 't']);

		return array_merge(iterator_to_array($a), iterator_to_array($b));
	}

}
