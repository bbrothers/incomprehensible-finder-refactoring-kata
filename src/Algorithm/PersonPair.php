<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Algorithm;

final class PersonPair
{
    /** @var Person */
    public $youngest;

    /** @var Person */
    public $oldest;

    /** @var int */
    public $ageDifferenceInSeconds;

    public function __construct(Person $person1 = null, Person $person2 = null)
    {
        if ($person1 and $person2) {
            if ($person1->isYounger($person2)) {
                $this->youngest = $person1;
                $this->oldest = $person2;
            } else {
                $this->youngest = $person2;
                $this->oldest = $person1;
            }
            $this->ageDifferenceInSeconds();
        }
    }

    public function ageDifferenceInSeconds()
    {

        $this->ageDifferenceInSeconds = $this->oldest->birthDate->getTimestamp()
                                     - $this->youngest->birthDate->getTimestamp();
    }
}
