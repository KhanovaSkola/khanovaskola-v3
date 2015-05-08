<?php

namespace App\Components;

use App\Models\Services\Highlight;
use App\Models\Services\Inflection;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\Utils\DateTime;


class Filters
{

	public function register(Template $template, Inflection $inflection)
	{
		foreach ([
			'timeAgo', 'duration', 'hours', 'minutes', 'templateLink', 'lcFirst', 'subjectColor', 'subjectIcon', 'highlight'
		] as $filter)
		{
			$template->addFilter($filter, [$this, $filter]);
		}

		$cases = [
			'nominative' => 1,
			'genitive' => 2,
			'dative' => 3,
			'accusative' => 4,
			'vocative' => 5,
			'locative' => 6,
			'instrumental' => 7,
		];
		foreach ($cases as $name => $case)
		{
			$template->addFilter($name, function($phrase) use ($case, $inflection) {
				return $inflection->inflect($phrase, $case);
			});
		}
	}

	public function timeAgo(DateTime $d)
	{
		return Html::el('time')
			->setText($d->format('j.n.Y H:i'))
			->addAttributes([
				'datetime' => $d->format('c')
			]);
	}

	public function duration($seconds)
	{
		$m = floor($seconds / 60);
		$s = round($seconds - 60 * $m);

		return $m . ':' . str_pad($s, 2, '0', STR_PAD_LEFT);
	}

	public function hours($seconds)
	{
		return round($seconds / 3600);
	}

	public function minutes($seconds)
	{
		return round($seconds / 60);
	}

	public function templateLink($link)
	{
		return strtr($link, ['%7B' => '{', '%7D' => '}']);
	}

	public function lcFirst($text)
	{
		return lcFirst($text);
	}

	public function subjectColor($schema)
	{
		return $schema && $schema->subject ? $schema->subject->color : 'gray';
	}

	public function subjectIcon($schema)
	{
		return $schema && $schema->subject ? $schema->subject->icon : 'subject-history';
	}

	public function highlight($phrase)
	{
		return Highlight::process($phrase);
	}

}
