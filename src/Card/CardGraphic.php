<?php

namespace App\Card;

class CardGraphic extends Card
{
    private array $representation = [];

    public function __construct()
    {
        parent::__construct();

        $this->representation = $this->generateUnicode();
    }

    public function getAsString(): string
    {
        return $this->representation[$this->value - 1];
    }

    public function generateUnicode()
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
