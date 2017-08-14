<?php

declare(strict_types = 1);

namespace FinderKata\People;

use DateInterval;
use DateTimeInterface;

/**
 * Class Person
 * @package FinderKata\People
 */
final class Person
{
    /** @var string */
    private $name;

    /** @var DateTimeInterface */
    private $birthDate;

    /**
     * Person constructor.
     * @param string            $name
     * @param DateTimeInterface $birthDate
     */
    public function __construct(string $name, DateTimeInterface $birthDate)
    {
        $this->setName($name);
        $this->setBirthDate($birthDate);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return DateTimeInterface
     */
    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * @param DateTimeInterface $birthDate
     */
    public function setBirthDate(DateTimeInterface $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @param Person $person
     * @return DateInterval
     */
    public function ageDifference(Person $person) : DateInterval
    {
        return $this->birthDate->diff($person->getBirthDate());
    }

    /**
     * @param Person $person
     * @return bool
     */
    public function isYounger(Person $person) : bool
    {
        return $this->getBirthDate() > $person->getBirthDate();
    }
}
