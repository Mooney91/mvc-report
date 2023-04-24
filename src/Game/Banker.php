<?php

namespace App\Game;
// use App\Card\CardHand;

class Banker extends Player
{
    protected $identifier = "Banker";

    public function __construct(string $string, object $game)
    {
        parent::__construct($string, $game);
    }

    public function decide() {
        // for ($i = 0; $i < 5; $i++) {
        //    $this->twist();
        // }

        $decision = "";

        if ($this->getPoints() < 17) {
            $this->twist();
            $decision = "twist";
        } else {
            $this->stick();
            $decision = "stick";
        }
        
        return $decision;
    }
}