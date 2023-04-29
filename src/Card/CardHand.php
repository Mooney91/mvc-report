<?php

namespace App\Card;

use App\Card\Card;

/**
 * The class for a card hand
 * @author Zachary Mooney
 */
class CardHand
{
    /**
     * @var array<object> An array of cards
     */
    private array $hand = [];

    /**
     * Adds a card to the hand.
     * @param Card $card The card to add.
     * @return void
     */
    public function add(Card $card): void
    {
        $this->hand[] = $card;
    }

    /**
     * Gets the number of cards in the hand.
     * @return int The number of cards in the hand.
     */
    public function getNumberCards(): int
    {
        return count($this->hand);
    }

    /**
     * Get the cards in the hand
     * @return object[]
     */
    public function getHand(): array
    {
        return $this->hand;
    }

    /**
     * Get the values of the cards in the hand 
     * @return string[]
     */
    public function getValues(): array
    {
        $values = [];
        foreach ($this->hand as $card) {
            $values[] = $card->getValue();
        }
        return $values;
    }

    /**
     * Get the string representations of the cards 
     * @return string[]
     */
    public function getString(): array
    {
        $values = [];
        foreach ($this->hand as $card) {
            $values[] = $card->getAsString();
        }
        return $values;
    }
}
