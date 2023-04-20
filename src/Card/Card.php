<?php

namespace App\Card;

class Card
{
    protected int $value;
    protected string $face;
    protected string $suit;

    public function __construct()
    {
        $this->value = 0;
        $this->face = "";
        $this->suit = "";
    }

    public function roll(): int
    {
        $this->value = random_int(1, 52);
        return $this->value;
    }

    public function setValue(int $arg): int
    {
        $this->value = $arg;
        return $this->value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setFace(string $arg): string
    {
        $this->face = $arg;
        return $this->face;
    }

    public function getFace(): string
    {
        return $this->face;
    }

    public function setSuit(string $arg): string
    {
        $this->suit = $arg;
        return $this->value;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getAsString(): string
    {
        return "[{$this->value}]";
    }
}
