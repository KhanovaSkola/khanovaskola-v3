<?php

namespace Bin\Commands\Report;

use App\Models\Orm\RepositoryContainer;
use Bin\Commands\Command;
use DibiConnection;


class Views extends Command
{

	const DELIM = ',';

	protected function configure()
	{
		$this->setName('report:views')
			->setDescription('Lists all videos with views and details');
	}

	public function invoke(RepositoryContainer $orm, DibiConnection $db)
	{
		$percentiles = [];
		for ($i = 0.1; $i <= 0.9; $i += 0.1)
		{
			$label = (1 - $i) * 100;
			$percentiles[] = "percentile_cont($i) WITHIN GROUP (ORDER BY [t.percent]) [perc-$label]";
		}

		$rows = $db->query('
			WITH t([video_id], [youtube_id], [percent]) AS (
				SELECT [v.id], [v.youtube_id], [vv.percent]
				FROM [video_views] [vv]
				LEFT JOIN [contents] [v] ON [vv.video_id] = [v.id]
			)
			SELECT [video_id], Count(*) [views], [youtube_id],
				' . implode(',', $percentiles) . '
			FROM [t]
			GROUP BY [video_id], [youtube_id]
			HAVING Count(*) >= 10
			ORDER BY Count(*) DESC
		')->fetchAll();

		$cols = ['video_id', 'youtube_id', 'views'];
		for ($l = 10; $l < 100; $l += 10)
		{
			$cols[] = "perc-$l";
		}

		$this->out->writeln(implode(self::DELIM, $cols));
		foreach ($rows as $row)
		{
			$out = [];
			foreach ($cols as $col)
			{
				if (strpos($col, 'perc-') === 0)
				{
					$out[] = number_format($row[$col], 2);
				}
				else
				{
					$out[] = $row[$col];
				}
			}
			$this->out->writeln(implode(self::DELIM, $out));
		}
	}

}
