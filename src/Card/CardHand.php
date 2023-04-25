<?php

namespace App\Card;

use App\Card\Card;

class CardHand
{
    /**
     * @var array<object> An array of cards
     */
    private array $hand = [];

    public function add(Card $card): void
    {
        $this->hand[] = $card;
    }


    public function getNumberCards(): int
    {
        return count($this->hand);
    }

     /**
    * @return object[]
    */
    public function getHand(): array
    {
        return $this->hand;
    }

    /**
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
