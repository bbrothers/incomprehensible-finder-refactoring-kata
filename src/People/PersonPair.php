<?php

declare(strict_types = 1);

namespace FinderKata\People;

/**
 * Class PersonPair
 * @package FinderKata\People
 */
class PersonPair
{
    /** @var Person */
    private $oldest;

    /** @var Person */
    private $youngest;

    /** @var \DateInterval */
    private $ageDifferenceInterval;

    /**
     * PersonPair constructor.
     * @param Person $person1
     * @param Person $person2
     */
    public function __construct(Person $person1, Person $person2)
    {
        [$this->youngest, $this->oldest] = $this->youngestFirst($person1, $person2);
    }

    /**
     * @param Person $firstPerson
     * @param Person $secondPerson
     * @return array
     */
    private function youngestFirst(Person $firstPerson, Person $secondPerson)
    {
        if ($firstPerson->isYounger($secondPerson)) {
            return [$firstPerson, $secondPerson];
        }
        return [$secondPerson, $firstPerson];
    }

    /**
     * @return Person
     */
    public function oldest()
    {
        return $this->oldest;
    }

    /**
     * @return Person
     */
    public function youngest()
    {
        return $this->youngest;
    }

    /**
     * @return \DateInterval
     */
    public function ageDifferenceInterval()
    {
        if ($this->ageDifferenceInterval === null) {
            $this->ageDifferenceInterval = $this->youngest->ageDifference($this->oldest);
        }
        return $this->ageDifferenceInterval;
    }
}
