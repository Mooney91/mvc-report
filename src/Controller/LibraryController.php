<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Library;
use App\Repository\LibraryRepository;
use Doctrine\Persistence\ManagerRegistry;

class LibraryController extends AbstractController
{
    #[Route('/library', name: 'app_library')]
    public function index(): Response
    {
        return $this->render('library/index.html.twig', [
            'controller_name' => 'LibraryController',
        ]);
    }

    #[Route("/library/create", name: "library_create_get", methods: ['GET'])]
    public function createBookGet(): Response
    {
        return $this->render('library/create.html.twig');
    }

    #[Route('/library/create', name: 'library_create_post', methods: ['POST'])]
    public function createBookPost(
        Request $request,
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $title = $request->request->get('title');
        $author = $request->request->get('author');
        $isbn = $request->request->get('isbn');
        $picture = $request->request->get('picture');

        $book = new Library();
        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setIsbn($isbn);
        $book->setPicture($picture);

        // tell Doctrine you want to (eventually) save the Library
        // (no queries yet)
        $entityManager->persist($book);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        // return new Response('Saved new book with id '.$book->getId());
        return $this->redirectToRoute('library_show_all');
    }

    #[Route('/library/show', name: 'library_show_all')]
    public function showAllLibrary(
        LibraryRepository $libraryRepository
    ): Response {
        $books= $libraryRepository
            ->findAll();

        $data = [];

        foreach ($books as $book) {
            $id = $book->getId();
            $title = $book->getTitle();
            $author = $book->getAuthor();
            $isbn = $book->getIsbn();
            $picture = $book->getPicture();

            $details = [
                "id" => $id,
                "title" => $title,
                "author" => $author,
                "isbn" => $isbn,
                "picture" => $picture
            ];

            array_push($data, $details);
        }

        return $this->render('library/library.html.twig', [ "data" => $data ]);
    }

    #[Route('/library/show/{id}', name: 'library_by_id')]
    public function showLibraryById(
        LibraryRepository $libraryRepository,
        int $id
    ): Response {
        $book = $libraryRepository
            ->find($id);

        $title = $book->getTitle();
        $author = $book->getAuthor();
        $isbn = $book->getIsbn();
        $picture = $book->getPicture();

        $data = [
            "id" => $id,
            "title" => $title,
            "author" => $author,
            "isbn" => $isbn,
            "picture" => $picture
        ];

        return $this->render('library/book.html.twig', $data);
    }

    #[Route("/library/delete/{id}", name: "library_delete_by_id_get", methods: ['GET'])]
    public function deleteLibraryByIdGet(
        LibraryRepository $libraryRepository,
        int $id
    ): Response {
        $book = $libraryRepository
            ->find($id);

        $title = $book->getTitle();
        $author = $book->getAuthor();
        $isbn = $book->getIsbn();
        $picture = $book->getPicture();

        $data = [
            "id" => $id,
            "title" => $title,
            "author" => $author,
            "isbn" => $isbn,
            "picture" => $picture
        ];

        return $this->render('library/delete.html.twig', $data);
    }

    #[Route('/library/delete/{id}', name: 'library_delete_by_id_post', methods: ['POST'])]
    public function deleteLibraryByIdPost(
        LibraryRepository $libraryRepository,
        int $id
    ): Response {
        $book = $libraryRepository->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id '.$id
            );
        }

        $libraryRepository->remove($book, true);

        return $this->redirectToRoute('library_show_all');
    }


    #[Route("/library/update/{id}", name: "library_update_get", methods: ['GET'])]
    public function updateLibraryGet(
        LibraryRepository $libraryRepository,
        int $id
    ): Response {
        $book = $libraryRepository
            ->find($id);

        $title = $book->getTitle();
        $author = $book->getAuthor();
        $isbn = $book->getIsbn();
        $picture = $book->getPicture();

        $data = [
            "id" => $id,
            "title" => $title,
            "author" => $author,
            "isbn" => $isbn,
            "picture" => $picture
        ];

        return $this->render('library/update.html.twig', $data);
    }

    #[Route('/library/update/{id}', name: 'library_update_post', methods: ['POST'])]
    public function updateLibraryPost(
        Request $request,
        LibraryRepository $libraryRepository,
        int $id,
    ): Response {
        $book = $libraryRepository->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id '.$id
            );
        }

        $title = $request->request->get('title');
        $author = $request->request->get('author');
        $isbn = $request->request->get('isbn');
        $picture = $request->request->get('picture');

        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setIsbn($isbn);
        $book->setPicture($picture);

        $libraryRepository->save($book, true);

        return $this->redirectToRoute('library_by_id', ['id' => $id]);
    }


    #[Route("/library/reset", name: "library_reset_get", methods: ['GET'])]
    public function resetLibraryGet(
    ): Response {
        // CONFIRM WITH THE USER THAT THEY DO WISH TO RESET
        return $this->render('library/reset.html.twig');
    }


    #[Route("/library/reset", name: "library_reset_post", methods: ['POST'])]
    public function resetLibraryPost(
        LibraryRepository $libraryRepository,
        ManagerRegistry $doctrine
    ): Response {
        // DELETE ALL BOOKS IN THE LIBRARY
        $books= $libraryRepository
            ->findAll();

        foreach ($books as $book) {
            $libraryRepository->remove($book, true);
        }

        // ADD ALL BOOKS USING THE JSON FILE
        $json = file_get_contents('../library.json');
        $jsonData = json_decode($json, true);

        $entityManager = $doctrine->getManager();

        foreach ($jsonData as $bookData) {
            $book = new Library();
            $book->setTitle($bookData['title']);
            $book->setAuthor($bookData['author']);
            $book->setIsbn($bookData['isbn']);
            $book->setPicture($bookData['picture']);

            $entityManager->persist($book);
        }

        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }
}
