<?php

namespace App\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Banker.
 */
class BankerTest extends TestCase
{
    /**
     * Construct object and verify it it a Banker object.
     */
    public function testCreateObject(): void
    {
        $game = new Game();
        $banker = new Banker("Banker", $game);
        $this->assertInstanceOf("\App\Game\Banker", $banker);

        $res = $banker->getIdentifier();
        $exp = "Banker";
        $this->assertEquals($exp, $res);
    }

    /**
     * Test Decide function with outcome Twist.
     */
    public function testDecideTwist(): void
    {
        $game = new Game();
        $banker = new Banker("Banker", $game);
        $banker->setPoints(10);
        $res = $banker->decide();
        $exp = "twist";

        $this->assertEquals($exp, $res);
    }

     /**
     * Test Decide function with outcome Stick.
     */
    public function testDecideStick(): void
    {
        $game = new Game();
        $banker = new Banker("Banker", $game);
        $banker->setPoints(19);
        $res = $banker->decide();
        $exp = "stick";

        $this->assertEquals($exp, $res);
    }
}