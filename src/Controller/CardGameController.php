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

class CardGameController extends AbstractController
{
    #[Route("/card", name: "card_start")]
    public function home(
        Request $request,
        SessionInterface $session
    ): Response {
        // START THE SESSION
        session_start();
        // CREATE A NEW DECK OF CARDS AND SET IT IN SESSION
        $deck = new DeckOfCards(52);
        $session->set("deck", $deck);
        return $this->render('card/home.html.twig');
    }

    #[Route("/card/deck", name: "card_deck")]
    public function deck(
        Request $request,
        SessionInterface $session
    ): Response {
        // GET DECK OF CARDS AND SORT IT
        $deck = $session->get("deck");
        $deck->sortDeck();

        $data = [
            "deck" => $deck,
            "deckString" => $deck->getString(),
            "deckArray" => $deck->getDeck(),
        ];

        return $this->render('card/card_deck.html.twig', $data);
    }

    #[Route("/card/deck/shuffle", name: "card_deck_shuffle")]
    public function shuffle(
        Request $request,
        SessionInterface $session
    ): Response {

        // CREATE NEW DECK OF CARDS, SHUFFLE IT, AND SET IT IN SESSION
        $deck = new DeckOfCards(52);
        $deck->deckShuffle();
        $session->set("deck", $deck);

        $data = [
            "deck" => $deck,
            "deckString" => $deck->getString(),
            "deckArray" => $deck->getDeck(),
        ];

        return $this->render('card/card_deck_shuffle.html.twig', $data);
    }

    #[Route("/card/deck/draw", name: "card_deck_draw")]
    public function draw(
        Request $request,
        SessionInterface $session
    ): Response {
        // GET THE DECK OF CARDS
        $deck = $session->get("deck");
        // DRAW A CARD FROM THE DECK
        $discarded = $deck->draw();
        // GET A STRING REPRESENTATION OF THE DISCARDED CARD
        $discardedCard = $discarded->getAsString();
        // COUNT HOW MANY CARDS ARE LEFT IN THE DECK
        $total_cards = $deck->cardsInDeck();

        // CREATE A NEW HAND, ADD THE DISCARDED HAND TO IT, AND SET IN IT SESSION
        if (isset($_SESSION['playerx'])) {
            $hand = $session->get("playerx");
            $hand->add($discarded);
        } else {
            $hand = new CardHand();
            $hand->add($discarded);
            $session->set("playerx", $hand);
        }

        $data = [
            "total" => $total_cards,
            "discarded" => $discardedCard,
        ];

        return $this->render('card/card_deck_draw.html.twig', $data);
    }

    #[Route("/card/deck/draw/{num<\d+>}", name: "card_deck_draw_num")]
    public function drawWithNum(
        int $num,
        Request $request,
        SessionInterface $session
    ): Response {
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
            "total" => $total_cards,
            "discarded" => $discardedCards,
            "number" => $num,
        ];

        return $this->render('card/card_deck_draw_num.html.twig', $data);
    }

    #[Route("/card/deck/deal/{num1<\d+>}/{num2<\d+>}", name: "card_deck_deal")]
    public function deal(
        int $num1,
        int $num2,
        Request $request,
        SessionInterface $session
    ): Response {
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
            $game[$i] = $handAsString;
        }

        // COUNT NUMBER OF HANDS IN THE DECK AFTER DISCARDING
        $total_cards = $deck->cardsInDeck();

        $data = [
            "total" => $total_cards,
            "game" => $game,
            "players" => $num1,
            "dealt" => $num2,
        ];

        return $this->render('card/card_deck_deal.html.twig', $data);
    }
}
