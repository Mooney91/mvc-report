<?php

namespace App\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Player.
 */
class PlayerTest extends TestCase
{
    /**
     * Construct object and verify it it a Player object.
     */
    public function testCreateObject(): void
    {
        $game = new Game();
        $player = new Player("Test", $game);
        $this->assertInstanceOf("\App\Game\Player", $player);

        $res = $player->getIdentifier();
        $exp = "Test";
        $this->assertEquals($exp, $res);
    }

    /**
     *  Test Twist and return Player's hand
     */
    public function testTwist(): void
    {
        $game = new Game();
        $player = new Player("Test", $game);
        $preHand = count($player->getHand());
        $player->twist();
        $postHand = count($player->getHand());
        $this->assertEquals($preHand + 1, $postHand);

    }

    /**
     * Tests that stick does nothing for the Player
     */
    public function testStick(): void
    {
        $game = new Game();
        $player = new Player("1", $game);
        $preHand = count($player->getHand());
        $player->stick();
        $postHand = count($player->getHand());
        $this->assertEquals($preHand, $postHand);
    }

    /**
     * Tests getHandString returns an array
     */
    public function testGetHandString(): void
    {
        $game = new Game();
        $player = new Player("1", $game);
        $player->twist();
        $player->twist();
        $res = $player->getHandString();
        $this->assertIsArray($res);
    }

    /**
     * Test getGame
     */
    public function testGetGame(): void
    {
        $game = new Game();
        $player = new Player("1", $game);
        $res = $player->getGame();
        $this->assertInstanceOf("\App\Game\Game", $res);
    }

    /**
     * Test that calculateHand() produces the correct result
     */
    public function testCalculateHand(): void
    {
        $game = new Game();
        $deck = $game->getDeck();
        $deck->sortDeck();

        $player = new Player("test", $game);
        $player->twist();
        $player->twist();
        $player->twist();
        $player->twist();

        $res = $player->calculateHand();
        $exp = 20;

        $this->assertEquals($exp, $res);
    }
     
}