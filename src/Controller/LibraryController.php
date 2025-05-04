<?php

/**
 * Library controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Repository\BookRepository;

class LibraryController extends AbstractController
{
    #[Route("/library", name: "library")]
    public function library(): Response
    {
        return $this->render('book/library.html.twig');
    }

    #[Route('/library/view', name: 'library_view')]
    public function libraryView(
        BookRepository $bookRepository
    ): Response {
        $books = $bookRepository->findAll();

        $data = [
            'books' => $books
        ];

        return $this->render('book/view.html.twig', $data);
    }

    #[Route('/library/view/{id}', name: 'library_view_id')]
    public function libraryViewID(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository->find($id);

        [$prev, $next] = $bookRepository->adjacentRecords($id);

        $data = [
            'book' => $book,
            'prev' => $prev,
            'next' => $next
        ];

        return $this->render('book/view_single.html.twig', $data);
    }

    #[Route('/library/edit/{id}', name: 'library_edit_id')]
    public function libraryEditID(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository->find($id);

        $data = [
            'book' => $book
        ];

        return $this->render('book/edit.html.twig', $data);
    }

    #[Route("/library/new", name: "library_new")]
    public function libraryNew(): Response
    {
        return $this->render('book/new.html.twig');
    }

    #[Route("/library/reset", name: "library_reset")]
    public function libraryReset(): Response
    {
        return $this->render('book/reset.html.twig');
    }

    #[Route('api/library/books', name: 'api_library_books')]
    public function apiLibraryBooks(
        BookRepository $bookRepository
    ): Response {
        $books = $bookRepository->findAll();

        $response = $this->json($books);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route('api/library/book/{isbn}', name: 'api_library_book_isbn')]
    public function apiLibraryBookIsbn(
        BookRepository $bookRepository,
        string $isbn
    ): Response {
        $id = $bookRepository->findBookFromIsbn($isbn);
        $book = $id ? $bookRepository->find($id) : new Book();

        $response = $this->json($book);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
