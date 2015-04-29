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
			WITH t([video_id], [youtube_id], [percent], [block], [schema]) AS (
				SELECT [v.id], [v.youtube_id], [vv.percent], [b.title], [s.title]
				FROM [video_views] [vv]
				LEFT JOIN [contents] [v] ON [vv.video_id] = [v.id]
				LEFT JOIN [content_block_bridges] [cbb] ON [cbb.content_id] = [v.id]
				LEFT JOIN [blocks] [b] ON [b.id] = [cbb.block_id]
				LEFT JOIN [block_schema_bridges] [bsb] ON [bsb.block_id] = [b.id]
				LEFT JOIN [schemas] [s] ON [bsb.schema_id] = [s.id]
				GROUP BY [v.id], [v.youtube_id], [vv.percent], [b.title], [s.title]
			)
			SELECT [video_id], Count(*) [views], [youtube_id], [block], [schema],
				' . implode(',', $percentiles) . '
			FROM [t]
			GROUP BY [video_id], [youtube_id], [block], [schema]
			HAVING Count(*) >= 10
			ORDER BY Count(*) DESC
		')->fetchAll();

		$cols = ['video_id', 'youtube_id', 'schema', 'block', 'views'];
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
