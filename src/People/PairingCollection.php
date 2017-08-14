<?php

namespace FinderKata\People;

/**
 * Class PairingCollection
 * @package FinderKata\People
 */
class PairingCollection
{

    /**
     * @var array
     */
    protected $pairings;

    /**
     * PairingCollection constructor.
     * @param array $people
     */
    public function __construct(array $people)
    {
        $this->pairings = $this->generateCombinations($people);
    }

    /**
     * @return PersonPair
     */
    public function findPairClosestInAge() : PersonPair
    {
        return end($this->pairings);
    }

    /**
     * @return PersonPair
     */
    public function findPairFarthestApartInAge() : PersonPair
    {
        return reset($this->pairings);
    }

    /**
     * @param array $people
     * @return array
     */
    private function generateCombinations(array $people)
    {
        $combinations = [];
        while ($people) {
            $subject = array_shift($people);
            $combinations += $this->contrastPeople($subject, $people);
        }
        return $this->sortByBirthDateDistance($combinations);
    }

    /**
     * @param Person $subject
     * @param array  $people
     * @return array
     */
    private function contrastPeople(Person $subject, array $people)
    {
        return array_map(function ($person) use ($subject) {
            return new PersonPair($subject, $person);
        }, $people);
    }

    /**
     * @param array $combinations
     * @return array
     */
    private function sortByBirthDateDistance(array $combinations)
    {
        usort($combinations, function (PersonPair $firstPair, PersonPair $secondPair) {
            return $secondPair->ageDifferenceInterval()->days <=> $firstPair->ageDifferenceInterval()->days;
        });

        return $combinations ?: [new EmptyPersonPair];
    }
}
