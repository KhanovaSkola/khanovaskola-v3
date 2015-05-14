<?php

namespace App\Models\Services;


class Srt
{

	const CHAR_END = '~[.?!]$~u';

	public function parse($plaintext)
	{
		$parsed = [];
		foreach (preg_split('~(^|\r*\n\r*\n\r*)\d+\r*\n\r*~u', $plaintext, -1, PREG_SPLIT_NO_EMPTY) as $row)
		{
			$row = preg_replace_callback('~(\d+:\d+:\d+[.,]\d+)\s+-->\s+(\d+:\d+:\d+[.,]\d+)\n+~mu', function ($m) use (&$start, &$end)
			{
				$start = $this->parseTime($m[1]);
				$end = $this->parseTime($m[2]);
				return '';
			}, $row);
			$parsed[] = [$start, $end, $row];
		}
		return $parsed;
	}

	public function parseToTimedSentences($plaintext)
	{
		$srt = $this->parse($plaintext);

		$missingSentenceEnds = count(array_filter($srt, function($row) {
			return preg_match(self::CHAR_END, $row[2]);
		})) < count($srt) / 6;

		$result = [];
		$sentence = NULL;
		$time = NULL;
		$lastCharEndedSentence = FALSE;

		foreach ($srt as list($start, $end, $text))
		{
			if (!$text)
			{
				continue;
			}

			$text = preg_replace('~\s+~u', ' ', $text);
			$startsWithUppercase = $text[0] === mb_convert_case($text[0], MB_CASE_UPPER);
			if ($time === NULL)
			{
				$time = $start;
			}

			if (($lastCharEndedSentence || $missingSentenceEnds) && $startsWithUppercase)
			{
				$result[] = ['time' => $time, 'sentence' => $sentence];
				$time = NULL;
				$sentence = NULL;
			}

			$sentence = trim("$sentence $text", ' ');
			$lastCharEndedSentence = (bool) preg_match(self::CHAR_END, $text);
		}
		if ($sentence)
		{
			$result[] = ['time' => $time, 'sentence' => $sentence];
		}

		return $result;
	}

	/**
	 * @param string $time 00:00:18,943
	 * @return string seconds
	 */
	protected function parseTime($time)
	{
		list($h, $m, $s) = explode(':', $time);
		list($s) = explode('.', str_replace(',', '.', $s));
		return $h * 3600 + $m * 60 + $s;
	}

}
