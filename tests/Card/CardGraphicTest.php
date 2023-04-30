<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardGraphic.
 */
class CardGraphicTest extends TestCase
{
    /**
     * Construct object and verify it it a DeckOfCards object.
     */
    public function testCreateObject(): void
    {
        $card = new CardGraphic();
        $this->assertInstanceOf("\App\Card\CardGraphic", $card);

        $res = $card->getValue();
        $exp = 0;
        $this->assertEquals($exp, $res);
    }
}