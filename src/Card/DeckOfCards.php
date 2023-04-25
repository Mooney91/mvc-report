<?php

namespace App\Card;

use App\Card\CardGraphic;

class DeckOfCards
{
    /**
     * @var array<object> An array of cards
     */
    protected array $deck = [];
    protected int $total = 0;
        /**
     * @var array<string> An array of values for each card ("face")
     */
    protected array $faces = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
        /**
     * @var array<string> An array of suits
     */
    protected array $suits = ["♠", "♥", "♦", "♣"];

    public function __construct(int $num)
    {
        $this->total = $num;

        $idxF = 0;
        $idxS = 0;

        for ($idx = 1; $idx <= $num; $idx++) {
            $temp = new CardGraphic();
            $temp->setValue($idx);
            $temp->setFace($this->faces[$idxF]);
            $temp->setSuit($this->suits[$idxS]);
            // INCREMENT VARIABLES
            $idxF = ($idxF == (count($this->faces) - 1)) ? 0 : ($idxF + 1);
            $idxS = ($idxF == 0) ? (($idxS == (count($this->suits) - 1)) ? 0 : ($idxS + 1)) : $idxS;

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

    /**
    * @return object[]
    */
    public function getDeck(): array
    {
        return $this->deck;
    }

    /**
    * @return int[]
    */
    public function getValues(): array
    {
        $values = [];
        foreach ($this->deck as $card) {
            $values[] = $card->getValue();
        }
        return $values;
    }

    /**
    * @return string[]
    */
    public function getFaces(): array
    {
        $faces = [];
        foreach ($this->deck as $face) {
            $faces[] = $face->getFace();
        }
        return $faces;
    }

    /**
    * @return string[]
    */
    public function getSuits(): array
    {
        $suits = [];
        foreach ($this->deck as $suit) {
            $suits[] = $suit->getSuit();
        }
        return $suits;
    }

    /**
    * @return string[]
    */
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
