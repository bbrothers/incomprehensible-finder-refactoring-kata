<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKataTest\Algorithm;

use CodelyTV\FinderKata\Algorithm\Finder;
use CodelyTV\FinderKata\Algorithm\FindType;
use CodelyTV\FinderKata\Algorithm\Person;
use PHPUnit\Framework\TestCase;

final class FinderTest extends TestCase
{
    /** @var Person */
    private $sue;

    /** @var Person */
    private $greg;

    /** @var Person */
    private $sarah;

    /** @var Person */
    private $mike;

    protected function setUp()
    {
        $this->sue            = new Person();
        $this->sue->name      = "Sue";
        $this->sue->birthDate = new \DateTime("1950-01-01");

        $this->greg            = new Person();
        $this->greg->name      = "Greg";
        $this->greg->birthDate = new \DateTime("1952-05-01");

        $this->sarah            = new Person();
        $this->sarah->name      = "Sarah";
        $this->sarah->birthDate = new \DateTime("1982-01-01");

        $this->mike            = new Person();
        $this->mike->name      = "Mike";
        $this->mike->birthDate = new \DateTime("1979-01-01");
    }

    /** @test */
    public function should_return_empty_when_given_empty_list()
    {
        $list   = [];
        $finder = new Finder($list);

        $result = $finder->findPairWithClosestBirthdays();

        $this->assertEquals(null, $result->youngest);
        $this->assertEquals(null, $result->oldest);
    }

    /** @test */
    public function should_return_empty_when_given_one_person()
    {
        $people = [$this->sue];
        $finder = new Finder($people);

        $result = $finder->findPairWithClosestBirthdays();

        $this->assertEquals(null, $result->youngest);
        $this->assertEquals(null, $result->oldest);
    }

    /** @test */
    public function should_return_closest_two_for_two_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->findPairWithClosestBirthdays();

        $this->assertEquals($this->sue, $result->youngest);
        $this->assertEquals($this->greg, $result->oldest);
    }

    /** @test */
    public function should_return_furthest_two_for_two_people()
    {
        $list   = [];
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->findPairWithFarthestBirthdays();

        $this->assertEquals($this->greg, $result->youngest);
        $this->assertEquals($this->mike, $result->oldest);
    }

    /** @test */
    public function should_return_furthest_two_for_four_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->sarah;
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->findPairWithFarthestBirthdays();

        $this->assertEquals($this->sue, $result->youngest);
        $this->assertEquals($this->sarah, $result->oldest);
    }

    /**
     * @test
     */
    public function should_return_closest_two_for_four_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->sarah;
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->findPairWithClosestBirthdays();

        $this->assertEquals($this->sue, $result->youngest);
        $this->assertEquals($this->greg, $result->oldest);
    }
}
