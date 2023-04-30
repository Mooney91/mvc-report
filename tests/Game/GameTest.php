<?php

namespace App\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Game.
 */
class GameTest extends TestCase
{
    /**
     * Construct object and verify it it a Game object.
     */
    public function testCreateObject(): void
    {
        $game = new Game();
        $this->assertInstanceOf("\App\Game\Game", $game);

        $res = count($game->getPlayers());
        $exp = 2;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test setPlayer - add an extra player
     */
    public function testSetGetPlayer(): void
    {
        $game = new Game();
        $name = "Test";
        $game->setPlayer($name);
        $players = $game->getPlayers();
        $res = count($players);
        $exp = 3;
        $this->assertEquals($exp, $res);
    }

    /**
     * Add banker and count how many Bankers there are
     */
    public function testSetBanker(): void
    {
        $game = new Game();
        $this->assertInstanceOf("\App\Game\Game", $game);
        $game->setBanker();
        $res = count($game->getPlayers());
        $exp =3;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test getBanker
     */
    public function testGetBanker(): void
    {
        $game = new Game();
        $banker = $game->getBanker();
        $this->assertInstanceOf("\App\Game\Banker", $banker);
    }

    /**
     * Test getHuman
     */
    public function testGetHuman(): void
    {
        $game = new Game();
        $human = $game->getHuman();
        $this->assertInstanceOf("\App\Game\Player", $human);
    }

    /**
     * Add points to players and fetch an array of their points
     */
    public function testGetPlayersPoints(): void
    {
        $game = new Game(3);
        $players = $game->getPlayers();
        $point = 10;
        foreach ($players as $player) {
            $player->setPoints($point);
            $point += 5;
        }

        $res = array_values($game->getPlayersPoints());
        $exp = [10, 15, 20, 25];
        $this->assertEquals($exp, $res);
    }

    /**
     * Test that the next player is not the same player
     */
    public function testNotNextPlayer(): void
    {
        $game = new Game();
        $pl1 = $game->getCurrentPlayer();
        // $pl1Id = $pl1->getIdentifier();
        $exp = "1";
        $this->assertEquals($exp, $pl1->getIdentifier());

        $game->nextPlayer();
        $pl2 = $game->getCurrentPlayer();
        
        $this->assertNotEquals($exp, $pl2->getIdentifier());

        // $game->nextPlayer();
        // $pl3 = $game->getCurrentPlayer();

        // $this->assertEquals($exp, $pl3->getIdentifier());
    }

    /**
     * Test getDeck
     */
    public function testGetDeck(): void
    {
        $game = new Game();
        $deck = $game->getDeck();
        $this->assertInstanceOf("\App\Card\DeckOfCards", $deck);
    }

    /**
     * Test returnPoints()
     * Draw a card and check the points of the card
     */
    public function testReturnPoints(): void
    {
        $game = new Game();
        $deck = $game->getDeck();
        $deck->sortDeck();
        $card = $deck->draw();
        $res = $game->returnPoints($card);
        $exp = 1;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test getWinner
     */
    public function testGetWinner(): void
    {
        $game = new Game();
        $players = $game->getPlayers();
        $player = $players[0];
        $game->victory($player);

        $winner = $game->getWinner();
        $this->assertInstanceOf("\App\Game\Player", $winner);
        $this->assertEquals($player, $game->getWinner());
    }

}
