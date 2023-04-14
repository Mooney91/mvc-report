<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;
use App\Card\DeckOfCards;

class APIController extends AbstractController
{
    #[Route("/api", name: "api_start")]
    public function apiStart(
        Request $request,
        SessionInterface $session
    ): Response {
        // START THE SESSION
        session_start();
        // CREATE A NEW DECK OF CARDS AND SET IT IN SESSION
        $deck = new DeckOfCards(52);
        $session->set("deck", $deck);
        return $this->render('api.html.twig');
    }

    #[Route("/api/deck", name: "api_deck", methods: ['GET'])]
    public function apiDeck(
        Request $request,
        SessionInterface $session
    ): Response {
        // GET DECK OF CARDS AND SORT IT
        $deck = $session->get("deck");
        $deck->sortDeck();

        $data = [
            "deck" => $deck->getString(),
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/deck/shuffle", name: "api_deck_shuffle", methods: ['POST'])]
    public function apiDeckShuffle(
        Request $request,
        SessionInterface $session
    ): Response {
        // CREATE NEW DECK OF CARDS, SHUFFLE IT, AND SET IT IN SESSION
        $deck = new DeckOfCards(52);
        $deck->deckShuffle();
        $session->set("deck", $deck);

        $data = [
            "deck" => $deck->getString(),
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/deck/draw/", name: "api_deck_draw_num", methods: ['POST'])]
    public function apiDeckDrawNum(
        Request $request,
        SessionInterface $session,
        // int $num,
    ): Response {
        $num = $request->request->get('num1');
        // GET THE DECK
        $deck = $session->get("deck");

        // GET PLAYERX'S HAND
        if (isset($_SESSION['playerx'])) {
            $hand = $session->get("playerx");
        } else {
            $hand = new CardHand();
            $session->set("playerx", $hand);
        }

        // NEW HAND IS USED TO SHOW DISCARDED CARDS ON THIS ROUND ONLY
        $newHand = new CardHand();

        // COUNT NUMBER OF HANDS IN DECK
        $total_cards = $deck->cardsInDeck();

        // IF THE NUMBER IS MORE THAN THE NUMBER OF CARDS IN THE DECK, THROW EXCEPTION
        if ($num > $total_cards) {
            throw new \Exception("You cannot draw more cards than there are in the deck!");
        }

        // DISCARD CARDS AND ADD TO HAND AND NEWHAND
        for ($i = 1; $i <= $num; $i++) {
            $discarded = $deck->draw();
            $hand->add($discarded);
            $newHand->add($discarded);
        }

        // COUNT NUMBER OF HANDS IN THE DECK AFTER DISCARDING
        $total_cards = $deck->cardsInDeck();
        // GET A ARRAY OF STRING REPRESENTATION FOR THE DISCARDED CARDS
        $discardedCards = $newHand->getString();

        $data = [
            "total_left" => $total_cards,
            "discarded" => $discardedCards,
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/deck/deal", name: "api_deal", methods: ['POST'])]
    public function apiDeal(
        Request $request,
        SessionInterface $session
        // int $num1,
        // int $num2,
    ): Response {
        $num1 = $request->request->get('num1');
        $num2 = $request->request->get('num2');
        // GET DECK OF CARDS
        $deck = $session->get("deck");
        // COUNT NUMBER OF CARDS IN THE DECK
        $total_cards = $deck->cardsInDeck();

        // IF THE NUMBER IS MORE THAN THE NUMBER OF CARDS IN THE DECK, THROW EXCEPTION
        if ($num2 > $total_cards) {
            throw new \Exception("You cannot draw more cards than there are in the deck!");
        }

        // CREATE AN ARRAY
        $game = [];

        // LOOP THROUGH NUMBER OF PLAYERS
        for ($i = 1; $i <= $num1; $i++) {
            // CREATE A NEW HAND
            $hand = new CardHand();
            // LOOP THROUGH THE NUMBER OF CARDS PER PLAYER
            for ($j = 1; $j <= $num2; $j++) {
                // DRAW FROM THE DECK
                $discarded = $deck->draw();
                // ADD TO THE HAND
                $hand->add($discarded);
            }

            // ADD THE DISCARDED CARDS TO THE ARRAY GAME FOR THIS PLAYER
            $handAsString = $hand->getString();
            // PLEASE NOTE THAT THIS DIFFERS FROM CARDGAMECONTROLLER
            $game["players"][$i] = array("hand" => $handAsString);
        }

        // COUNT NUMBER OF HANDS IN THE DECK AFTER DISCARDING
        $total_cards = $deck->cardsInDeck();

        $data = [
            "total_left" => $total_cards,
            "game" => $game,
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
