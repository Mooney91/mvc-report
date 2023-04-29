<?php

namespace App\Game;

use App\Card\DeckOfCards;
use App\Game\Player;
use App\Game\Banker;
use App\Card\Card;

/**
 * This is the main functionality for the game "Twenty-One"
 * @author Zachary Mooney
 */
class Game
{
    protected object $deck;
    /**
     * @var array<object> An array of cards
     */
    protected array $players = [];
    /**
     * This is the current player in play.
     * @var object
     */
    protected object $currentPlayer;
    /**
     * This is the Banker in the game.
     * @var object
     */
    protected object $banker;
    /**
     * This is the human in the game. Not very useful - may become deprecated.
     * @var object
     */
    protected object $human;
    /**
     * This is the winner of game.
     * @var object
     */
    protected object $winner;

    /**
     * Create a Game object
     * @param int   $num    The number of players
     */
    public function __construct(int$num = 1)
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

    /**
     * Add a new player to the players attribute
     * @param string   $identifier    The name of the player (this is usually numeric)
     * @return object  $player        Return the player
     */
    public function setPlayer(string $identifier): object
    {
        $player = new Player($identifier, $this);
        $this->players[] = $player;

        return $player;
    }

    /**
     * Add the Banker to the players attribute
     * @return object   $banker The banker
     */    
    public function setBanker(): object
    {
        $banker = new Banker("Banker", $this);
        $this->players[] = $banker;
        $this->banker = $banker;

        return $banker;
    }

    /**
    * Return an array of all the Players 
    * @return object[]
    */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
    * Return an associative array of the players' points
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

    /**
    * Get the Banker of the game
    * @return object   The banker
    */ 
    public function getBanker(): object
    {
        return $this->banker;
    }

    /**
    * Get the Human of the game
    * @return object   The human (which in this version, is the Player)
    */ 
    public function getHuman(): object
    {
        return $this->human;
    }

    /**
    * Change the current player to the next player in the Players array
    */ 
    public function nextPlayer(): void
    {
        $current = $this->getCurrentPlayer();
        $index = array_search($current, $this->getPlayers());
        $this->currentPlayer = $this->players[$index + 1];
        if (count($this->getPlayers()) == ($index + 1)) {
            $this->currentPlayer = $this->players[0];
        }
    }

    /**
    * Get the Current Player of the game
    * @return object   The current player attribute
    */ 
    public function getCurrentPlayer(): object
    {
        return $this->currentPlayer;
    }

    /**
    * Get the Deck of Cards that is used in the game
    * @return object   The desk of cards
    */ 
    public function getDeck(): object
    {
        return $this->deck;
    }

    /**
    * Return the points that a particular card has.
    * @param object       $card    A Card object
    * @return int         The number of points
    */ 
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

    /**
    * Set the player who won as the winner and returns their name
    * @param object       $player    The player who won
    * @return string      The winner/player's name as a string
    */ 
    public function victory(object $player): string
    {
        $this->winner = $player;

        return strval($player->getIdentifier());
    }

    /**
    * Return the winner of the game
    * @return object     The winner
    */ 
    public function getWinner(): object
    {
        return $this->winner;
    }
}
