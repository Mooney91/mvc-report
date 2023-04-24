<?php

namespace App\Card;

use App\Card\Card;

class CardHand
{
    private array $hand = [];

    public function add(Card $card): void
    {
        $this->hand[] = $card;
    }

    // public function roll(): void
    // {
    //     foreach ($this->hand as $card) {
    //         $die->roll();
    //     }
    // }

    public function getNumberCards(): int
    {
        return count($this->hand);
    }

    public function getHand(): array
    {
        return $this->hand;
        // $values = [];
        // foreach ($this->hand as $card) {
        //     $values[] = $card;
        // }
        // return $values;
    }

    public function getValues(): array
    {
        $values = [];
        foreach ($this->hand as $card) {
            $values[] = $card->getValue();
        }
        return $values;
    }

    public function getString(): array
    {
        $values = [];
        foreach ($this->hand as $card) {
            $values[] = $card->getAsString();
        }
        return $values;
    }
}
