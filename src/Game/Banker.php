<?php

namespace App\Game;

class Banker extends Player
{
    protected string $identifier = "Banker";

    public function __construct(string $string, object $game)
    {
        parent::__construct($string, $game);
    }

    public function decide(): string
    {
        $decision = "";

        if ($this->getPoints() < 17) {
            $this->twist();
            $decision = "twist";
            return $decision;
        }

        $this->stick();
        $decision = "stick";

        return $decision;
    }
}
