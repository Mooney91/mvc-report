<?php

namespace App\Card;

use App\Card\CardGraphic;

/**
 * The class for a deck of cards
 * @author Zachary Mooney
 */
class DeckOfCards
{
    /**
     * @var array<object> An array of cards
     */
    protected array $deck = [];
    /**
     * @var int The number of cards in the deck
     */
    protected int $total = 0;
    /**
     * @var array<string> An array of values for each card ("face")
     */
    protected array $faces = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    /**
     * @var array<string> An array of suits
     */
    protected array $suits = ["♠", "♥", "♦", "♣"];

    /**
     * Deck of Cards constructor
     * @param int $num The number of cards in the deck.
     */
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

    /**
     * Add a card to the deck.
     * @param CardGraphic $card The card to add to the deck.
     */
    public function add(CardGraphic $card): void
    {
        $this->deck[] = $card;
        // return $card;
    }

    /**
     * Draw a card from the deck.
     * @return object The card drawn from the top of the deck.
     */
    public function draw(): object
    {
        $drawn = array_shift($this->deck);
        return $drawn;
    }

    /**
     * Get the number of cards in the deck.
     * @return int The number of cards remaining in the deck.
     */
    public function cardsInDeck(): int
    {
        $total = count($this->deck);
        return $total;
    }

    /**
    * Get an array of all the cards
    * @return object[] An array of all the cards
    */
    public function getDeck(): array
    {
        return $this->deck;
    }

    /**
     * Get an array of all the cards' values
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
     * Get an array of all the cards' faces
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
     * Get an array of all the cards' suits
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
     * Get an array of all the cards' string representations
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

    /**
     * Shuffle the deck of cards
     */
    public function deckShuffle(): void
    {
        shuffle($this->deck);
    }

    /**
     * Sort the deck
     */
    public function sortDeck(): void
    {
        usort($this->deck, function ($arg1, $arg2) {
            return $arg1->getValue() - $arg2->getValue();
        });
    }
}
