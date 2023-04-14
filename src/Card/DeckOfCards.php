<?php

namespace App\Card;

use App\Card\CardGraphic;

class DeckOfCards
{
    protected $deck = [];
    protected $total = 0;


    public function __construct(int $num)
    {
        $this->total = $num;

        for ($i = 1; $i <= $num; $i++) {
            $temp = new CardGraphic();
            $temp->setValue($i);
            $this->add($temp);
        }
    }

    public function add(CardGraphic $card): void
    {
        $this->deck[] = $card;
        // return $card;
    }

    public function draw(): object
    {
        $drawn = array_shift($this->deck);
        return $drawn;
    }

    public function cardsInDeck(): int
    {
        $total = count($this->deck);
        return $total;
    }

    public function getDeck(): array
    {
        return $this->deck;
    }

    public function getValues(): array
    {
        $values = [];
        foreach ($this->deck as $card) {
            $values[] = $card->getValue();
        }
        return $values;
    }

    public function getString(): array
    {
        $values = [];
        foreach ($this->deck as $card) {
            $values[] = $card->getAsString();
        }
        return $values;
    }

    public function deckShuffle(): void
    {
        shuffle($this->deck);
    }


    public function sortDeck(): void
    {
        usort($this->deck, function ($arg1, $arg2) {
            return $arg1->getValue() - $arg2->getValue();
        });
    }
}
