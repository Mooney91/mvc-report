<?php

namespace App\Game;

use App\Card\CardHand;
use App\Game\Game;

/**
 * This is a player within the game "Twenty-One"
 * @author Zachary Mooney
 */
class Player
{
    /**
     * The player's identifier (name)
     * @var string
     */
    protected string $identifier = "";
    /**
     * The player's current hand
     * @var object
     */
    protected object $hand;
    /**
     * The player's points
     * @var int
     */
    protected int $points = 0;
    /**
     * The current game
     * @var object
     */
    protected object $game;

    /**
     * Player constructor.
     * @param string $string The player identifier.
     * @param Game $game The game instance.
     */
    public function __construct(string $string, object $game)
    {
        $this->hand = new CardHand();
        $this->game = $game;
        $this->identifier = $string;
    }

    /**
     * Get the player identifier.
     * @return string The player identifier.
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * Draw a card and add it to the player's hand.
     */
    public function twist(): void
    {
        $game = $this->game;
        $deck = $game->getDeck();
        $card = $deck->draw();
        $hand = $this->hand;
        $hand->add($card);
    }

    /**
     * Stick with the current hand - do nothing!
     */    
    public function stick(): void
    {
        // DO NOTHING
    }

    /**
    * Get the the player's has
    * @return object[]
    */
    public function getHand(): array
    {
        return $this->hand->getHand();
    }

    /**
    * Get the player's hand but with string representations
    * @return string[]
    */
    public function getHandString(): array
    {
        return $this->hand->getString();
    }

    /**
     * Get the game instance.
     * @return Game The game instance.
     */
    public function getGame(): object
    {
        return $this->game;
    }

    /**
     * Calculate the total points of the player's hand.
     * @return int The total points of the player's hand.
     */
    public function calculateHand(): int
    {
        $game = $this->getGame();
        $hand = $this->getHand();
        $aces = 0;
        $total = 0;
        $point = 0;

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

    /**
     * Get the total points of the player's hand.
     * @return int The total points of the player's hand.
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * Set the total points of the player's hand.
     * @param int $total The total points of the player's hand.
     */
    public function setPoints(int $total): void
    {
        $this->points = $total;
    }
}
