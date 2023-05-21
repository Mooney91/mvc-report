<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class LowEconomicTest extends TestCase
{
    /**
     * Test the getId method.
     */
    public function testGetId(): void
    {
        $lowEconomic = new LowEconomic();

        $this->assertNull($lowEconomic->getId());
    }

    /**
     * Test the getBirthplace and setBirthplace methods.
     */
    public function testGetAndSetBirthplace(): void
    {
        $lowEconomic = new LowEconomic();
        $lowEconomic->setBirthplace('Afrika');

        $this->assertEquals('Afrika', $lowEconomic->getBirthplace());
    }

    /**
     * Test the getYear and setYear methods.
     */
    public function testGetAndSetYear(): void
    {
        $lowEconomic = new LowEconomic();
        $lowEconomic->setYear('2023');

        $this->assertEquals('2023', $lowEconomic->getYear());
    }

    /**
     * Test the getPercentage and setPercentage methods.
     */
    public function testGetAndSetPercentage(): void
    {
        $lowEconomic = new LowEconomic();
        $lowEconomic->setPercentage(30);

        $this->assertEquals(30, $lowEconomic->getPercentage());
    }
}