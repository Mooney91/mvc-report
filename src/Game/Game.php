<?php

namespace App\Game;

use App\Card\DeckOfCards;
use App\Game\Player;
use App\Game\Banker;
use App\Card\Card;

class Game
{
    protected object $deck;
    /**
     * @var array<object> An array of cards
     */
    protected array $players = [];
    protected object $currentPlayer;
    protected object $banker;
    protected object $human;
    protected object $winner;

    public function __construct(int$num)
    {
        for ($i = 1; $i <= $num; $i++) {
            $this->setPlayer(strval($i));
        }
        $this->setBanker();
        $deck = new DeckOfCards(52);
        $deck->deckShuffle();
        $this->deck = $deck;
        $this->human = $this->players[0];
        $this->currentPlayer = $this->players[0];
    }

    public function setPlayer(string $identifier): object
    {
        $player = new Player($identifier, $this);
        $this->players[] = $player;

        return $player;
    }

    public function setBanker(): object
    {
        $banker = new Banker("Banker", $this);
        $this->players[] = $banker;
        $this->banker = $banker;

        return $banker;
    }

    /**
    * @return object[]
    */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
    * @return array<string, int>
    */
    public function getPlayersPoints(): array
    {
        $playersPoints = [];
        foreach ($this->players as $player) {
            $identifier = $player->getIdentifier();
            $points = $player->getPoints();
            $playersPoints[$identifier] = $points;
        }
        return $playersPoints;
    }

    public function getBanker(): object
    {
        return $this->banker;
    }

    public function getHuman(): object
    {
        return $this->human;
    }

    public function nextPlayer(): void
    {
        $current = $this->getCurrentPlayer();
        $index = array_search($current, $this->getPlayers());
        $this->currentPlayer = $this->players[$index + 1];
        if (count($this->getPlayers()) == ($index + 1)) {
                $this->currentPlayer = $this->players[0];
            }
    }

    public function getCurrentPlayer(): object
    {
        return $this->currentPlayer;
    }

    public function getDeck(): object
    {
        return $this->deck;
    }

    public function returnPoints(object $card): int
    {
        $face = $card->getFace();

        $values = ["A" => 1,
                   "2" => 2,
                   "3" => 3,
                   "4" => 4,
                   "5" => 5,
                   "6" => 6,
                   "7" => 7,
                   "8" => 8,
                   "9" => 9,
                   "10" => 10,
                   "J" => 10,
                   "Q" => 10,
                   "K" => 10];

        return $values[$face];
    }

    public function victory(object $player): string
    {
        $this->winner = $player;

        return strval($player->getIdentifier());
    }

    public function getWinner(): object
    {
        return $this->winner;
    }
}
