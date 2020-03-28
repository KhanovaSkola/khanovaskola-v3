<?php

namespace App\Components;

use App\Models\Services\Highlight;
use App\Models\Services\Inflection;
use Mikulas\Vlna;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\Utils\DateTime;


class Filters
{

	/**
	 * @var Vlna
	 */
	private $vlna;

	/**
	 * @var Inflection
	 */
	private $inflection;

	public function __construct(Vlna $vlna, Inflection $inflection)
	{
		$this->vlna = $vlna;
		$this->inflection = $inflection;
	}

	public function register(Template $template)
	{
		foreach ([
			'timeAgo', 'duration', 'isoDuration', 'hours', 'minutes', 'templateLink',
	         'lcFirst', 'subjectColor', 'subjectIcon', 'highlight', 'vlna',
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
			$template->addFilter($name, function($phrase) use ($case) {
				return $this->inflection->inflect($phrase, $case);
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

	public function isoDuration($seconds)
	{
		$h = floor($seconds / 3600);
		$m = floor($seconds / 60 - 60 * $h);
		$s = round($seconds - 60 * $m);

		return 'T' . $h . 'H' . $m . 'M' . str_pad($s, 2, '0', STR_PAD_LEFT) . 'S';
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

	/**
	 * @param string $content
	 * @return string
	 */
	public function vlna($content)
	{
		$v = $this->vlna;
		return $v($content);
	}

}
