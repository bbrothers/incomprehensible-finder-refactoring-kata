<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Algorithm;

final class Finder
{
    /** @var Person[] */
    private $people;

    public function __construct(array $people)
    {
        $this->people = $people;
    }

    public function findPairWithClosestBirthdays() : PersonPair
    {

        $pairings = $this->getSortedPairs();
        return array_pop($pairings);
    }

    public function findPairWithFarthestBirthdays() : PersonPair
    {

        $pairings = $this->getSortedPairs();
        return array_shift($pairings);
    }

    public function getSortedPairs() : array
    {
        /** @var PersonPair[] $pairings */
        $pairings = [];

        for ($i = 0; $i < count($this->people); $i++) {
            $firstPerson = $this->people[$i];
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $secondPerson = $this->people[$j];
                $pairings[] = new PersonPair($firstPerson, $secondPerson);
            }
        }

        if (count($pairings) < 1) {
            return [new PersonPair];
        }

        usort($pairings, function (PersonPair $a, PersonPair $b) {
            return $a->ageDifferenceInSeconds < $b->ageDifferenceInSeconds;
        });
        return $pairings;
    }
}
