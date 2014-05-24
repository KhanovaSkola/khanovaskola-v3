<?php

namespace Faker\Provider\cs_CZ;


/**
 * Czech months and days without setting locale
 */
class DateTime extends \Faker\Provider\DateTime
{

    protected static $days = array('neděle', 'pondělí', 'úterý', 'středa', 'čtvrtek', 'pátek', 'sobota');
    protected static $months = array('leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec');
    protected static $monthsGenitive  = array('ledna', 'února', 'března', 'dubna', 'května', 'června', 'července', 'srpna', 'září', 'října', 'listopadu', 'prosince');

    public static function monthName($max = 'now')
    {
        return static::$months[parent::month($max) - 1];
    }

    public static function monthNameGenitive($max = 'now')
    {
        return static::$monthsGenitive[parent::month($max) - 1];
    }

    public static function dayOfWeek($max = 'now')
    {
        return static::$days[static::dateTime($max)->format('w')];
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @return string
     * @example '2'
     */
    public static function dayOfMonth($max = 'now')
    {
        return static::dateTime($max)->format('j');
    }

    /**
     * @param string $max
     * @return string
     * @example 16. listopadu 2003
     */
    public function formattedDate($max = 'now')
    {
        return $this->generator->parse('{{dayOfMonth}}. {{monthNameGenitive}} {{year}}');
    }
}
