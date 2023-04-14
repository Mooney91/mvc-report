<?php

namespace App\Card;

class Card
{
    protected $value;
    // protected $suit;
    // protected $number;

    public function __construct()
    {
        $this->value = null;
    }

    public function roll(): int
    {
        $this->value = random_int(1, 52);
        return $this->value;
    }

    public function setValue($arg): int
    {
        $this->value = $arg;
        return $this->value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getAsString(): string
    {
        return "[{$this->value}]";
    }
}
