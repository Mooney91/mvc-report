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
use App\Repository\LibraryRepository;
use Exception;

class APIController extends AbstractController
{
    #[Route("/api", name: "api_start")]
    public function apiStart(
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
        SessionInterface $session
    ): Response {
        // GET DECK OF CARDS AND SORT IT
        $deck = $session->get("deck");
        $deck->sortDeck();

        $data = [
            "deck" => $deck->getString(),
            "faces" => $deck->getFaces(),
            "suits" => $deck->getSuits(),
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/deck/shuffle", name: "api_deck_shuffle", methods: ['POST'])]
    public function apiDeckShuffle(
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
    ): Response {
        $num = $request->request->get('num1');
        // GET THE DECK
        $deck = $session->get("deck");

        // GET PLAYERX'S HAND
        $hand = $session->get("playerx", new CardHand());
        $session->set("playerx", $hand);

        // NEW HAND IS USED TO SHOW DISCARDED CARDS ON THIS ROUND ONLY
        $newHand = new CardHand();

        // COUNT NUMBER OF HANDS IN DECK
        $totalCards = $deck->cardsInDeck();

        // IF THE NUMBER IS MORE THAN THE NUMBER OF CARDS IN THE DECK, THROW EXCEPTION
        if ($num > $totalCards) {
            throw new Exception("You cannot draw more cards than there are in the deck!");
        }

        // DISCARD CARDS AND ADD TO HAND AND NEWHAND
        for ($i = 1; $i <= $num; $i++) {
            $discarded = $deck->draw();
            $hand->add($discarded);
            $newHand->add($discarded);
        }

        // COUNT NUMBER OF HANDS IN THE DECK AFTER DISCARDING
        $totalCards = $deck->cardsInDeck();
        // GET A ARRAY OF STRING REPRESENTATION FOR THE DISCARDED CARDS
        $discardedCards = $newHand->getString();

        $data = [
            "total_left" => $totalCards,
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
    ): Response {
        $num1 = $request->request->get('num1');
        $num2 = $request->request->get('num2');
        // GET DECK OF CARDS
        $deck = $session->get("deck");
        // COUNT NUMBER OF CARDS IN THE DECK
        $totalCards = $deck->cardsInDeck();

        // IF THE NUMBER IS MORE THAN THE NUMBER OF CARDS IN THE DECK, THROW EXCEPTION
        if ($num2 > $totalCards) {
            throw new Exception("You cannot draw more cards than there are in the deck!");
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
        $totalCards = $deck->cardsInDeck();

        $data = [
            "total_left" => $totalCards,
            "game" => $game,
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/game", name: "api_game", methods: ['GET'])]
    public function apiGame(
        SessionInterface $session
    ): Response {
        // GET GAME
        $game = $session->get("game");
        $currentPlayer = $game->getCurrentPlayer();
        $banker = $game->getBanker();
        $human = $game->getHuman();

        $data = [
            "Points" => $game->getPlayersPoints(),
            "Current Player" => $currentPlayer->getIdentifier(),
            "Player Hand" => $human->getHandString(),
            "Banker Hand" => $banker->getHandString(),
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route('/api/library/books', name: 'api_library_books')]
    public function apiLibraryBooks(
        LibraryRepository $libraryRepository
    ): Response {
        $books = $libraryRepository
            ->findAll();

        $response = $this->json($books);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route('/api/library/book/{isbn}', name: 'api_book_by_isbn')]
    public function apiBookByIsbn(
        LibraryRepository $libraryRepository,
        string $isbn
    ): Response {
        $books = $libraryRepository
            ->findAll();

        $id = "";

        foreach ($books as $book) {
            if ($book->getIsbn() == $isbn) {
                $id = $book->getId();
                break;
            }
        }

        if (!$id) {
            throw $this->createNotFoundException(
                'This book does not exist.'
            );
        }

        $book = $libraryRepository
            ->find($id);

        return $this->json($book);
    }
}
