<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardHand.
 */
class CardHandTest extends TestCase
{
    /**
     * Construct object and verify it it a CardHand object.
     */
    public function testCreateObject(): void
    {
        $cardHand = new CardHand();
        $this->assertInstanceOf("\App\Card\CardHand", $cardHand);

        $res = $cardHand->getNumberCards();
        $exp = 0;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test getting an array of values of the hand
     */
    public function testGetValues(): void
    {
        $cardHand = new CardHand();
        $card1 = new Card();
        $card2 = new Card();
        $card3 = new Card();
        $card1->setValue(7);
        $card2->setValue(9);
        $card3->setValue(8);
        $cardHand->add($card1);
        $cardHand->add($card2);
        $cardHand->add($card3);

        $res = $cardHand->getValues();
        $exp = [7, 9, 8];
        $this->assertIsArray($res);
        $this->assertEquals($exp, $res);
    }
}