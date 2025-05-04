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
    /** Display library main page. */
    #[Route("/library", name: "library")]
    public function library(): Response
    {
        return $this->render('book/library.html.twig');
    }

    /** Display book list. */
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

    /** Display single book. */
    #[Route('/library/view/{id}', name: 'library_view_id')]
    public function libraryViewID(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository->find($id);

        if (!$book) {
            $this->addFlash(
                'notice',
                'Bok med ID ' . $id . ' finns inte.'
            );
            return $this->redirectToRoute('library_view');
        }

        [$prev, $next] = $bookRepository->adjacentRecords($id);

        $data = [
            'book' => $book,
            'prev' => $prev,
            'next' => $next
        ];

        return $this->render('book/view_single.html.twig', $data);
    }

    /** Display page for editing book. */
    #[Route('/library/edit/{id}', name: 'library_edit_id')]
    public function libraryEditID(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository->find($id);

        if (!$book) {
            $this->addFlash(
                'notice',
                'Bok med ID ' . $id . ' finns inte.'
            );
            return $this->redirectToRoute('library_view');
        }

        $data = [
            'book' => $book
        ];

        return $this->render('book/edit.html.twig', $data);
    }

    /** Display page for adding new book. */
    #[Route("/library/new", name: "library_new")]
    public function libraryNew(): Response
    {
        return $this->render('book/new.html.twig');
    }

    /** Display page for reseting library. */
    #[Route("/library/reset", name: "library_reset")]
    public function libraryReset(): Response
    {
        return $this->render('book/reset.html.twig');
    }

    /** Display API data for books in library. */
    #[Route('/api/library/books', name: 'api_library_books')]
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

    /** Display API data for single book from ISBN. */
    #[Route('/api/library/book/{isbn}', name: 'api_library_book_isbn')]
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
