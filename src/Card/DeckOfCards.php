<?php

namespace App\Card;

use App\Card\CardGraphic;

class DeckOfCards
{
    protected $deck = [];
    protected $total = 0;
    protected $faces = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    protected $suits = ["♠", "♥", "♦", "♣"];

    public function __construct(int $num)
    {
        $this->total = $num;

        $j = 0;
        $k = 0;

        for ($i = 1; $i <= $num; $i++) {
            $temp = new CardGraphic();
            $temp->setValue($i);
            $temp->setFace($this->faces[$j]);
            $temp->setSuit($this->suits[$k]);

            if ($j < (count($this->faces)-1) ) {
                $j += 1;
            } else {
                $j = 0;
                if ($k < (count($this->suits)-1)) {
                    $k += 1;
                }
            }

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

    public function getFaces(): array
    {
        $faces = [];
        foreach ($this->deck as $face) {
            $faces[] = $face->getFace();
        }
        return $faces;
    }

    public function getSuits(): array
    {
        $suits = [];
        foreach ($this->deck as $suit) {
            $suits[] = $suit->getSuit();
        }
        return $suits;
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
