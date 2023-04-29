<?php

namespace App\Game;

/**
 * This is the Banker class inheriting from Player
 * @author Zachary Mooney
 */
class Banker extends Player
{
    /**
     * The Banker's identifier (name)
     * @var string
     */
    protected string $identifier = "Banker";

    /**
     * Banker constructor.
     * @param string $string The player identifier.
     * @param Game $game The game instance.
     */
    public function __construct(string $string, object $game)
    {
        parent::__construct($string, $game);
    }

    /**
    * Decide the Banker's next move (twist or stick)
    */ 
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
