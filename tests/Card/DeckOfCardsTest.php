<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DeckOfCards.
 */
class DeckOfCardsTest extends TestCase
{
    /**
     * Construct object and verify it it a DeckOfCards object.
     */
    public function testCreateObject(): void
    {
        $deck = new DeckOfCards(4);
        $this->assertInstanceOf("\App\Card\DeckOfCards", $deck);

        $res = $deck->cardsInDeck();
        $exp = 4;
        $this->assertEquals($exp, $res);
    }


     /**
     * Test that the a card can be drawn
     */
    public function testDraw(): void
    {
        $deck = new DeckOfCards(52);
        $card = $deck->draw();
        $this->assertInstanceOf("\App\Card\Card", $card);
    }

    /**
     * Test that the a card can be drawn
     */
    public function testGetDeck(): void
    {
        $deck = new DeckOfCards(52);
        $res = $deck->getDeck();
        $this->assertIsArray($res);
        $this->assertInstanceOf("\App\Card\Card", $res[0]);
    }

    /**
     * Test getting an array of values of the Deck
     */
    public function testGetValues(): void
    {
        $num = 52;
        $deck = new DeckOfCards($num);
        $res = $deck->getValues();
        $total = count($res);
        $this->assertIsArray($res);
        $this->assertEquals($num, $total);
    }

    /**
     * Test getting an array of faces of the Deck
     */
    public function testGetFaces(): void
    {
        $num = 52;
        $deck = new DeckOfCards($num);
        $res = $deck->getFaces();
        $total = count($res);
        $this->assertIsArray($res);
        $this->assertIsString($res[0]);
        $this->assertEquals($num, $total);
    }

    /**
     * Test getting an array of suits of the Deck
     */
    public function testGetSuits(): void
    {
        $num = 52;
        $deck = new DeckOfCards($num);
        $res = $deck->getSuits();
        $total = count($res);
        $this->assertIsArray($res);
        $this->assertIsString($res[0]);
        $this->assertEquals($num, $total);
    }

    /**
     * Test getting an array of strings of the Deck
     */
    public function testGetString(): void
    {
        $num = 52;
        $deck = new DeckOfCards($num);
        $res = $deck->getString();
        $total = count($res);
        $this->assertIsArray($res);
        $this->assertIsString($res[0]);
        $this->assertEquals($num, $total);
    }
}