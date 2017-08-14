<?php

namespace FinderKata\People;

use DateInterval;

/**
 * Class EmptyPersonPair
 * @package FinderKata\People
 */
class EmptyPersonPair extends PersonPair
{

    /**
     * EmptyPersonPair constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return null
     */
    public function oldest()
    {

        return null;
    }

    /**
     * @return null
     */
    public function youngest()
    {

        return null;
    }

    /**
     * @return DateInterval
     */
    public function ageDifferenceInterval()
    {

        return new DateInterval('P0Y');
    }
}
