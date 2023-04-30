<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Card.
 */
class CardTest extends TestCase
{
    /**
     * Construct object and verify it it a DeckOfCards object.
     */
    public function testCreateObject(): void
    {
        $card = new Card();
        $this->assertInstanceOf("\App\Card\Card", $card);

        $res = $card->getValue();
        $exp = 0;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test the Roll function and check if it is within bounds
     */
    public function testRoll(): void
    {
        $card = new Card();
        $card->Roll();
        $res = $card->getValue();
        $this->assertGreaterThanOrEqual(1, $res);
        $this->assertLessThanOrEqual(52, $res);
    }

    /**
     * Test the Roll function and check if it is within bounds
     */
    public function testGetSuit(): void
    {
        $card = new Card();
        $card->setSuit("♠");
        $res = $card->getSuit();
        $exp = "♠";
        $this->assertNotEquals("", $res);
        $this->assertEquals($exp, $res);

    }

    /**
     * Test the getAsString - check the correct value and string datatype
     */
    public function testGetAsString(): void
    {
        $card = new Card();
        $card->setValue(7);
        $res = $card->getAsString();;
        $exp = "[7]";
        $this->assertIsString($res);
        $this->assertEquals($exp, $res);
    }
}