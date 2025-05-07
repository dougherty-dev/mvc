<?php

/**
 * Library controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Library;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Repository\BookRepository;

/**
 * The LibraryAPIController class.
 */
class LibraryAPIController extends AbstractController
{
    /**
     * Display API data for books in library.
     */
    #[Route('/api/library/books', name: 'api_library_books')]
    public function apiLibraryBooks(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll();

        $response = $this->json($books);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
        return $response;
    }

    /**
     * Display API data for single book from ISBN.
     */
    #[Route('/api/library/book/{isbn}', name: 'api_library_book_isbn')]
    public function apiLibraryBookIsbn(BookRepository $bookRepository, string $isbn): Response
    {
        $id = $bookRepository->findBookFromIsbn($isbn);
        $book = $id ? $bookRepository->find($id) : new Book();

        $response = $this->json($book);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
