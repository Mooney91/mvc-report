<?php

namespace App\Game;

use App\Card\CardHand;
use App\Game\Game;


class Player
{

    protected $identifier = "";
    protected object $hand;
    protected int $points = 0;
    protected object $game;

    public function __construct($string, $game)
    {
        $this->hand = new CardHand;
        $this->game = $game;
        $this->identifier = $string;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function twist(): void
    {

        $game = $this->game;
        $deck = $game->getDeck();
        $card = $deck->draw();
        $hand = $this->hand;
        $hand->add($card);

    }

    public function stick(): void
    {
        // DO SOMETHING
    }

    public function getHand(): array
    {
        return $this->hand->getHand();
    }

    public function getHandString(): array
    {
        return $this->hand->getString();
    }

    public function getGame(): object
    {
        return $this->game;
    }

    public function calculateHand()
    {
        $game = $this->getGame();
        $hand = $this->getHand();
        $aces = 0;
        $total = 0;
        // $total = count($hand);
        $point;

        foreach ($hand as $card) {
            $point = $game->returnPoints($card);
            if ($point === 1) {
                $aces++;
            }

            $total += $point;
        }

        
        while ($total <= 11 && $aces > 0) {
            $total += 10;
            $aces--;
        }


        $this->setPoints($total);


        return $total;

    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function setPoints(int $total): void
    {
        $this->points = $total;
    }
}