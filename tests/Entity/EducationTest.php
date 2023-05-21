<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class EducationTest extends TestCase
{
    /**
     * Test the getId method.
     */
    public function testGetId(): void
    {
        $education = new Education();

        $this->assertNull($education->getId());
    }

    /**
     * Test the getGender and setGender methods.
     */
    public function testGetAndSetGender(): void
    {
        $education = new Education();
        $education->setGender('Male');

        $this->assertEquals('Male', $education->getGender());
    }

    /**
     * Test the getEducationLevel and setEducationLevel methods.
     */
    public function testGetAndSetEducationLevel(): void
    {
        $education = new Education();
        $education->setEducationLevel('Förskola');

        $this->assertEquals('Förskola', $education->getEducationLevel());
    }

    /**
     * Test the getYear and setYear methods.
     */
    public function testGetAndSetYear(): void
    {
        $education = new Education();
        $education->setYear('2023');

        $this->assertEquals('2023', $education->getYear());
    }

    /**
     * Test the getPercentage and setPercentage methods.
     */
    public function testGetAndSetPercentage(): void
    {
        $education = new Education();
        $education->setPercentage(30);

        $this->assertEquals(30, $education->getPercentage());
    }
}