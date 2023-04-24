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
        Request $request,
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
        Request $request,
        SessionInterface $session
    ): Response
    {
        $game =  $session->get("game");
        $banker = $game->getBanker();
        $currentPlayer = $game->getCurrentPlayer();
        $bankTurn = false;
        $players = $game->getPlayers();
        $identifier = $currentPlayer->getIdentifier();
        $currentPlayer->calculateHand();
        $points = $currentPlayer->getPoints();
        $bankerPoints = $banker->getPoints();
        $playersPoints = $game->getPlayersPoints();
        $bankersDecision = "";

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
        $victory = "";
        $bankTurn = $request->query->getBoolean('bankTurn');
        $game = $session->get("game");
        $currentPlayer = $game->getCurrentPlayer();
        $human = $game->getHuman();
        $banker = $game->getBanker();
        $bankersDecision = "";

        // if ($currentPlayer->getIdentifier() === $banker->getIdentifier()) {
        //     $bankTurn = true;
            
        //     // while (!$banker->decide()) {}
        //     $banker->decide();

        //     if ($currentPlayer->getPoints() > 21) {
        //         $victory = $game->victory($human);
        //     }
            
        //     if ($currentPlayer->getPoints()>= $human->getPoints()) {
        //         $victory = $game->victory($banker);
        //     } 
        // } else {
            if ($request->request->has('twist')) {
                $currentPlayer->twist();
                $currentPlayer->calculateHand();
                if ($currentPlayer->getPoints() > 21) {
                    $victory = $game->victory($banker);
                }
            } elseif($request->request->has('stick')) {
                $currentPlayer->stick();
                $game->nextPlayer();
                $bankTurn = true;
            } elseif($request->request->has('restart')) {
                return $this->redirectToRoute('game_start');
            } elseif ($request->request->has('banker')) {
                $bankersDecision = $banker->decide();
                $bankTurn = true;

                if ($banker->getPoints() > 21) {
                    $victory = $game->victory($human);
                } else if ($bankersDecision == "stick") {
                    if ($banker->getPoints() >= $human->getPoints()) {
                        $victory = $game->victory($banker);
                    } else if ($banker->getPoints() < $human->getPoints()) {
                    $victory = $game->victory($human);
                    }
                }

                if ($bankersDecision == "stick") {
                    $bankersDecision = "The Banker decides to stick!";
                } else {
                    $bankersDecision = "The Banker takes another card...";
                }

            };
        // }

        $currentPlayer = $game->getCurrentPlayer();
        $playerHand = $currentPlayer->getHandString();
        $currentPlayer->calculateHand();
        $points = $currentPlayer->getPoints();
        $bankerPoints = $banker->getPoints();
        $playersPoints = $game->getPlayersPoints();

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
}
