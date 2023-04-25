<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;
use App\Card\DeckOfCards;
use App\Game\Game;
use App\Game\Player;
use App\Game\Banker;

class GameController extends AbstractController
{
    #[Route("/game", name: "game_start")]
    public function home(): Response
    {
        return $this->render('game/home.html.twig');
    }

    #[Route("/game/init", name: "game_init", methods: ['GET'])]
    public function init(
        SessionInterface $session
    ): Response
    {
        $game = new Game(1);
        $currentPlayer = $game->getCurrentPlayer();
        $playerHand = $currentPlayer->getHandString();

        $session->set("game", $game);
        $session->set("currentPlayer", $currentPlayer);
        $session->set("hand", $playerHand);

        return $this->redirectToRoute('game_play');
    }

    #[Route("/game/play", name: "game_play", methods: ['GET'])]
    public function play(
        SessionInterface $session
    ): Response
    {
        // GET CURRENT SESSION OF THE GAME
        $game =  $session->get("game");
        // CURRENT PLAYER
        $currentPlayer = $game->getCurrentPlayer();
        $identifier = $currentPlayer->getIdentifier();
        $currentPlayer->calculateHand();
        $points = $currentPlayer->getPoints();
        // BANKER
        $banker = $game->getBanker();
        $bankTurn = false; // FOR TEMPLATE: INDICATES IF IT IS BANKER'S TURN
        $bankerPoints = $banker->getPoints();
        $bankersDecision = "";
        // ALL PLAYERS
        $players = $game->getPlayers();
        $playersPoints = $game->getPlayersPoints();
        
        $data = [
        "game" => $game,
        "players" => $players,
        "currentPlayer" => $identifier,
        "hand" => $session->get("hand"),
        "points" => $points,
        "bankerPoints" => $bankerPoints,
        "victory" => "",
        "playersPoints" => $playersPoints,
        "bankTurn" => $bankTurn,
        "bankersDecision" => $bankersDecision,
        ];

        return $this->render('game/play.html.twig', $data);
    }

    #[Route("/game/play", name: "game_play_post", methods: ['POST'])]
    public function postPlay(
        Request $request,
        SessionInterface $session
    ): Response
    {
        // GET CURRENT SESSION OF THE GAME
        $game = $session->get("game");
        $victory = "";
        // PLAYERS
        $currentPlayer = $game->getCurrentPlayer();
        $human = $game->getHuman();
        $banker = $game->getBanker();
        $bankersDecision = "";
        $bankTurn = $request->query->getBoolean('bankTurn');

        if ($request->request->has('twist')) { // HUMAN PLAYER TWISTS
            $victory = $this->twist($game, $currentPlayer, $banker);
        } elseif ($request->request->has('stick')) { // HUMAN PLAYER STICKS
            $bankTurn = $this->stick($game, $currentPlayer);
        } elseif ($request->request->has('restart')) { // CLICKED ON RESTART BUTTON - NEW GAME
            return $this->redirectToRoute('game_start');
        } elseif ($request->request->has('banker')) { // BANKER'S TURN
            $result =$this->bankerTurn($game, $human, $banker);
            $bankersDecision = $result["bankersDecision"];
            $bankTurn = $result["bankTurn"];
            $victory = $result["victory"];
        }

        // CURRENT PLAYER AND CURRENT STATE
        $currentPlayer = $game->getCurrentPlayer();
        $playerHand = $currentPlayer->getHandString();
        $currentPlayer->calculateHand();
        $points = $currentPlayer->getPoints();
        // BANKER
        $bankerPoints = $banker->getPoints();
        // PLAYERS
        $playersPoints = $game->getPlayersPoints();

        // SAVE VARIABLES IN SESSION
        $session->set("game", $game);
        $session->set("currentPlayer", $currentPlayer);
        $session->set("hand", $playerHand);

        $data = [
            "game" => $session->get("game"),
            "currentPlayer" => $currentPlayer->getIdentifier(),
            "hand" => $session->get("hand"),
            "points" => $points,
            "bankerPoints" => $bankerPoints,
            "victory" => $victory,
            "playersPoints" => $playersPoints,
            "bankTurn" => $bankTurn,
            "bankersDecision" => $bankersDecision,
        ];
        
        return $this->render('game/play.html.twig', $data);
    }

    #[Route("/game/doc", name: "game_doc")]
    public function doc(): Response
    {
        return $this->render('game/doc.html.twig');
    }

    public function twist(Game $game, Player $currentPlayer, Banker $banker): string
    {
        // TWIST EXECUTED
        $currentPlayer->twist();
        // LOOK AT HAND AND LOOK HOW MANY POINTS
        $currentPlayer->calculateHand();
        // IF PLAYER GOES BUST, BANKER WINS
        if ($currentPlayer->getPoints() > 21) {
           return $game->victory($banker); //victory
        }

        return ""; //victory
    }

    public function stick(Game $game, Player $currentPlayer): bool
    {
        // MOVES ONTO NEXT PLAYER - THE BANKER
        
        $currentPlayer->stick();
        $game->nextPlayer();
        return true; // bankTurn
    }

    /**
    * @return string[]
    */
    public function bankerTurn(Game $game, Player $human, Banker $banker): array
    {
        // THE BANKER MAKES A DECISION
        $bankersDecision = $banker->decide();
        $banker->calculateHand();
        $bankTurn = true;
        $victory = "";

        switch (true) {
            case $banker->getPoints() > 21: // IF BANKER GOES BUST HUMAN PLAYER WINS
                $bankersDecision = "Banker goes bust!";
                $victory = $game->victory($human);
                break;
            case $bankersDecision == "stick": // IF THE BANKER DECIDES TO STICK
                if ($banker->getPoints() >= $human->getPoints()) { // IF POINTS ARE MORE THAN OR SAME AS HUMAN, BANKER WINS
                    $victory = $game->victory($banker);
                } else if ($banker->getPoints() < $human->getPoints()) { // IF BANKER'S POINTS ARE LESS THAN HUMAN'S, HUMAN WINS
                    $victory = $game->victory($human);
                }
                $bankersDecision = "The Banker decides to stick!";
                break;
            default:
                $bankersDecision = "The Banker takes another card...";
        }

        return array("bankersDecision" => $bankersDecision, "bankTurn" => $bankTurn, "victory" => $victory);
    }
}
