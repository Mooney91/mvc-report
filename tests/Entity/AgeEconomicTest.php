<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class AgeEconomicTest extends TestCase
{
    /**
     * Test the getId method.
     *
     * @return void
     */
    public function testGetId(): void
    {
        $ageEconomic = new AgeEconomic();
        $this->assertNull($ageEconomic->getId());
    }

    /**
     * Test the getAge and setAge methods.
     *
     * @return void
     */
    public function testGetAndSetAge(): void
    {
        $ageEconomic = new AgeEconomic();
        $ageEconomic->setAge('18-24');

        $this->assertEquals('18-24', $ageEconomic->getAge());
    }

    /**
     * Test the getGender and setGender methods.
     *
     * @return void
     */
    public function testGetAndSetGender(): void
    {
        $ageEconomic = new AgeEconomic();
        $ageEconomic->setGender('Male');

        $this->assertEquals('Male', $ageEconomic->getGender());
    }

    /**
     * Test the getYear and setYear methods.
     *
     * @return void
     */
    public function testGetAndSetYear(): void
    {
        $ageEconomic = new AgeEconomic();
        $ageEconomic->setYear('2023');

        $this->assertEquals('2023', $ageEconomic->getYear());
    }

    /**
     * Test the getPercentage and setPercentage methods.
     *
     * @return void
     */
    public function testGetAndSetPercentage(): void
    {
        $ageEconomic = new AgeEconomic();
        $ageEconomic->setPercentage(50.5);

        $this->assertEquals(50.5, $ageEconomic->getPercentage());
    }
}