<?php

namespace App\Card;

/**
 * The class for the graphical representation of the card.
 * Inherits from Card.
 * @author Zachary Mooney
 */
class CardGraphic extends Card
{
    /**
     * @var array<string> Graphical representations of cards
     */
    private array $representation = [];

    /**
     * CardGraphic constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->representation = $this->generateUnicode();
    }

        /**
     * Get the string representation of the card
     * @return string The representation of the card
     */
    public function getAsString(): string
    {
        return $this->representation[$this->value - 1];
    }

    /**
     * Generate an array of Unicode representations of cards
     * @return string[] An array of Unicode representations of cards
     */
    public function generateUnicode(): array
    {
        $uniSuits = ["A", "B", "C", "D"];
        $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, "A", "B", "D", "E"];

        $rep = [];
        foreach ($uniSuits as $uniSuit) {
            foreach ($numbers as $number) {
                $codepoint = hexdec("1F0" . $uniSuit . $number);
                $unicode = html_entity_decode('&#' . $codepoint . ';', ENT_NOQUOTES, 'UTF-8');
                $rep[] = $unicode;
            }
        }
        return $rep;
    }
}
