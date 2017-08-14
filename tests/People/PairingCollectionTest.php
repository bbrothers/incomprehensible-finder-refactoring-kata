<?php

declare(strict_types = 1);

namespace FinderKataTest\Algorithm;

use FinderKata\People\PairingCollection;
use FinderKata\People\Person;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

final class PairingCollectionTest extends TestCase
{

    /** @test */
    public function should_return_empty_when_given_empty_list()
    {

        $list = [];
        $collection = new PairingCollection($list);

        $result = $collection->findPairClosestInAge();

        $this->assertEquals(null, $result->oldest());
        $this->assertEquals(null, $result->youngest());
    }

    /** @test */
    public function should_return_empty_when_given_one_person()
    {

        $people = [new Person("Sue", new DateTimeImmutable("1950-01-01"))];
        $collection = new PairingCollection($people);

        $result = $collection->findPairClosestInAge();

        $this->assertEquals(null, $result->oldest());
        $this->assertEquals(null, $result->youngest());
    }

    /** @test */
    public function should_return_closest_two_for_two_people()
    {

        $sue = new Person("Sue", new DateTimeImmutable("1950-01-01"));
        $greg = new Person("Greg", new DateTimeImmutable("1952-05-01"));
        $collection = new PairingCollection([$sue, $greg]);

        $result = $collection->findPairClosestInAge();

        $this->assertEquals($sue, $result->oldest());
        $this->assertEquals($greg, $result->youngest());
    }

    /** @test */
    public function should_return_furthest_two_for_two_people()
    {

        $greg = new Person("Greg", new DateTimeImmutable("1952-05-01"));
        $mike = new Person("Mike", new DateTimeImmutable("1979-01-01"));
        $collection = new PairingCollection([$mike, $greg]);

        $result = $collection->findPairFarthestApartInAge();

        $this->assertEquals($greg, $result->oldest());
        $this->assertEquals($mike, $result->youngest());
    }

    /** @test */
    public function should_return_furthest_two_for_four_people()
    {

        $sue = new Person("Sue", new DateTimeImmutable("1950-01-01"));
        $greg = new Person("Greg", new DateTimeImmutable("1952-05-01"));
        $sarah = new Person("Sarah", new DateTimeImmutable("1982-01-01"));
        $mike = new Person("Mike", new DateTimeImmutable("1979-01-01"));
        $collection = new PairingCollection([$sue, $sarah, $mike, $greg]);

        $result = $collection->findPairFarthestApartInAge();

        $this->assertEquals($sue, $result->oldest());
        $this->assertEquals($sarah, $result->youngest());
    }

    /**
     * @test
     */
    public function should_return_closest_two_for_four_people()
    {

        $sue = new Person("Sue", new DateTimeImmutable("1950-01-01"));
        $greg = new Person("Greg", new DateTimeImmutable("1952-05-01"));
        $sarah = new Person("Sarah", new DateTimeImmutable("1982-01-01"));
        $mike = new Person("Mike", new DateTimeImmutable("1979-01-01"));
        $collection = new PairingCollection([$sue, $sarah, $mike, $greg]);

        $result = $collection->findPairClosestInAge();

        $this->assertEquals($sue, $result->oldest());
        $this->assertEquals($greg, $result->youngest());
    }
}
