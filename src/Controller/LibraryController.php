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
        // $book->setTitle('temp_title_' . rand(1, 9));
        // $book->setAuthor('temp_author_' . rand(1, 9));
        // $book->setIsbn('temp_isbn_' . rand(1, 9));
        // $book->setPicture('temp_picture_' . rand(1, 9));

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

        // $data = [
        //     "data" => $data
        // ];

        // $response = $this->json($books);
        // $response->setEncodingOptions(
        //     $response->getEncodingOptions() | JSON_PRETTY_PRINT
        // );
        // return $response;
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
        // return $this->json($book);
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
        // return $this->json($book);
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
        // return $this->json($book);
        return $this->render('library/update.html.twig', $data);
    }

    #[Route('/library/update/{id}', name: 'library_update_post', methods: ['POST'])]
    public function updateLibraryPost(
        Request $request,
        LibraryRepository $libraryRepository,
        int $id,
        // string $picture
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

        // return $this->redirectToRoute('library_show_all');
        return $this->redirectToRoute('library_by_id', ['id' => $id]);
    }
}
