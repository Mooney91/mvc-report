<?php

namespace App\Card;

/**
 * The class for a card
 * @author Zachary Mooney
 */
class Card
{
    /**
     * @var int The value of the card.
     */
    protected int $value;
    /**
     * @var string The face of the card (the picture side).
     */
    protected string $face;
    /**
     * @var string The suit of the card
     */
    protected string $suit;

    /**
     * Card constructor
     */
    public function __construct()
    {
        $this->value = 0;
        $this->face = "";
        $this->suit = "";
    }

    /**
     * Create a random value for the card
     * @return int The value of the card
     */
    public function roll(): int
    {
        $this->value = random_int(1, 52);
        return $this->value;
    }

    /**
     * Set the value of the card to the given integer
     * @param int $arg The new value of the card
     * @return int The new value of the card
     */
    public function setValue(int $arg): int
    {
        $this->value = $arg;
        return $this->value;
    }

    /**
     * Get the value of the card
     * @return int The value of the card
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Set the face of the card
     * @param string $arg The face of the card
     * @return string The new face of the card
     */
    public function setFace(string $arg): string
    {
        $this->face = $arg;
        return $this->face;
    }

    /**
     * Get the face of the card
     * @return string The face of the card
     */
    public function getFace(): string
    {
        return $this->face;
    }

    /**
     * Set the suit of the card
     * @param string $arg The new suit of the card
     * @return string The new suit of the card
     */
    public function setSuit(string $arg): string
    {
        $this->suit = $arg;
        return $this->suit;
    }

    /**
     * Get the suit of the card
     * @return string The suit of the card
     */
    public function getSuit(): string
    {
        return $this->suit;
    }

    /**
     * Returns a string representation of the card
     * @return string The string representation of the card
     */
    public function getAsString(): string
    {
        return "[{$this->value}]";
    }
}
