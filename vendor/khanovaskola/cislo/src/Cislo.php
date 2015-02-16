<?php

namespace KhanovaSkola;

use Nette\Utils\Strings;


class Cislo
{

	public static function toWord($number)
	{
		if ($number < 0 || $number > 1e9 - 1)
		{
			throw new OutOfRangeException("Number '$number' should be from [0, 999_999_999]");
		}
		if ($number && !ctype_digit("$number"))
		{
			throw new InvalidArgumentException("Expecting integer, got $number.");
		}
		if ((string) $number !== "0" && !$number)
		{
			return '';
		}
		if ($number == 0)
		{
			return 'nula';
		}

		$groups = [];
		while ($group = substr($number, -3))
		{
			$number = substr($number, 0, -3);
			$groups[] = $group;
		}
		$groups = array_reverse($groups, TRUE);
		
		$words = [];
		foreach ($groups as $rank => $group)
		{
			if ($group == 0)
			{
				continue;
			}

			if ($group != 1)
			{
				$words[] = static::groupToWords($group);
			}
			switch ($rank)
			{
				case 0:
					break;
				case 1:
					$words[] = static::plural($group, 'tisíc', 'tisíce', 'tisíc');
					break;
				case 2:
					$words[] = static::plural($group, 'milion', 'miliony', 'milionů');
					break;
				default:
					throw new OutOfRangeException();
			}
		}

		return implode(' ', $words);
	}

	public static function plural($count, $one, $few, $many)
	{
		switch ($count)
		{
			case 1: return $one;
			case 2:
			case 3:
			case 4: return $few;
		}
		return $many;
	}

	public static function groupToWords($group)
	{
		$ranks = array_reverse(array_reverse(str_split($group), FALSE), TRUE) + [2 => 0, 1 => 0, 0 => 0];
		$hundreds = $ranks[2];
		$tens = $ranks[1] . $ranks[0];

		$words = [];
		if ($hundreds && $hundreds != 0)
		{
			$words[] = static::hundredsToWord($hundreds);
		}
		if ($tens && $tens != 0)
		{
			$words[] = static::tensToWord($tens);
		}
		return implode(' ', $words);
	}

	public static function hundredsToWord($hundreds)
	{
		switch ($hundreds)
		{
			case 1: return 'sto';
			case 2: return 'dvě stě';
			case 3: return 'tři sta';
			case 4: return 'čtyři sta';
			case 5: return 'pět set';
			case 6: return 'šest set';
			case 7: return 'sedm set';
			case 8: return 'osm set';
			case 9: return 'devět set';
		}
	}

	public static function tensToWord($tens)
	{
		if (!$tens)
		{
			return NULL;
		}

		switch ($tens)
		{
			case 1: return 'jedna';
			case 2: return 'dva';
			case 3: return 'tři';
			case 4: return 'čtyři';
			case 5: return 'pět';
			case 6: return 'šest';
			case 7: return 'sedm';
			case 8: return 'osm';
			case 9: return 'devět';
			case 10: return 'deset';
			case 11: return 'jedenáct';
			case 12: return 'dvanáct';
			case 13: return 'třináct';
			case 14: return 'čtrnáct';
			case 15: return 'patnáct';
			case 16: return 'šestnáct';
			case 17: return 'sedmnáct';
			case 18: return 'osmnáct';
			case 19: return 'devatenáct';
		}

		$high = substr($tens, 0, 1);
		$low = substr($tens, 1, 1);

		$w = NULL;
		switch ($high)
		{
			case 2: $w = 'dvacet'; break;
			case 3: $w = 'třicet'; break;
			case 4: $w = 'čtyřicet'; break;
			case 5: $w = 'padesát'; break;
			case 6: $w = 'šedesát'; break;
			case 7: $w = 'sedmdesát'; break;
			case 8: $w = 'osmdesát'; break;
			case 9: $w = 'devadesát'; break;
		}

		return "$w " . static::tensToWord($low);
	}

	public static function parse($phrase)
	{
		$normalized = Strings::normalize(Strings::toAscii($phrase));

		$words = preg_split('~\\s+~', $normalized, -1, PREG_SPLIT_NO_EMPTY);

		$number = 0;
		$buffer = 0;

		while ($word = array_shift($words))
		{
			$compound = static::parseCompoundWord($word);
			if ($compound)
			{
				$buffer += $compound;
				continue;
			}

			switch ($word)
			{
				case 'a': // ignore
				case 'nula': // keep $number 0
				case 'jedno': // expecting 'sto'
					break;

				case 'jedna':
				case 'jeden':
					$buffer += 1; break;
				case 'dva':
				case 'dve':
					$buffer += 2; break;
				case 'tri':
					$buffer += 3; break;
				case 'ctyri':
					$buffer += 4; break;
				case 'pet':
					$buffer += 5; break;
				case 'sest':
					$buffer += 6; break;
				case 'sedm':
				case 'sedum':
					$buffer += 7; break;
				case 'osm':
				case 'osum':
					$buffer += 8; break;
				case 'devet':
					$buffer += 9; break;
				case 'jedenact':
					$buffer += 10; break;
				case 'dvanact':
					$buffer += 12; break;
				case 'trinact':
					$buffer += 13; break;
				case 'ctrnact':
					$buffer += 14; break;
				case 'patnact':
					$buffer += 15; break;
				case 'sestnact':
					$buffer += 16; break;
				case 'sedmnact':
				case 'sedumnact':
					$buffer += 17; break;
				case 'osmnact':
				case 'osumnact':
					$buffer += 18; break;
				case 'devatenact':
					$buffer += 19; break;
				case 'dvacet':
					$buffer += 20; break;
				case 'tricet':
					$buffer += 30; break;
				case 'ctyricet':
					$buffer += 40; break;
				case 'padesat':
					$buffer += 50; break;
				case 'sedesat':
					$buffer += 60; break;
				case 'sedmdesat':
				case 'sedumdesat':
					$buffer += 70; break;
				case 'osmdesat':
				case 'osumdesat':
					$buffer += 80; break;
				case 'devadesat':
					$buffer += 90; break;

				case 'sto':
					$buffer += 100; break;
				case 'ste':
				case 'sta':
				case 'set':
					if ($buffer >= 11 && $buffer <= 19) { // devatenact set
						$number += $buffer * 100;
						$buffer = 0;
					} else {
						$buffer *= 100;
					}
					break;

				case 'tisic':
				case 'tisice':
				case 'tisicu':
					$number += ($buffer ?: 1) * 1e3;
					$buffer = 0;
					break;

				case 'milion':
				case 'miliony':
				case 'milionu':
					$number += ($buffer ?: 1) * 1e6;
					$buffer = 0;
					break;

				default:
					throw new InvalidArgumentException("Failed to parse '$word'");
			}
		}

		return (int) $number + $buffer;
		var_dump($number, $buffer);
	}

	/**
	 * @var string $word folded
	 */
	public static function parseCompoundWord($word)
	{
		$tens = [
			'dvacet' => 20,
			'tricet' => 30,
			'ctyricet' => 40,
			'padesat' => 50,
			'sedesat' => 60,
			'sedmdesat' => 70,
			'sedumdesat' => 70,
			'osmdesat' => 80,
			'osumdesat' => 80,
			'devadesat' => 90,
		];
		foreach ($tens as $ten => $addition)
		{
			$lookup = "a$ten";
			if (substr($word, -strlen($lookup)) === $lookup)
			{
				return $addition + self::parse(substr($word, 0, -strlen($lookup)));
			}
		}

		return NULL;
	}

}
