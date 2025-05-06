<?php

/**
 * Library controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;

/** The LibraryViewController class. */
class LibraryViewController extends AbstractController
{
    /** Display book list. */
    #[Route('/library/view', name: 'library_view')]
    public function libraryView(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll();

        return $this->render('book/view.html.twig', ['books' => $books]);
    }

    /** Display single book. */
    #[Route('/library/view/{id}', name: 'library_view_id')]
    public function libraryViewID(BookRepository $bookRepository, int $id): Response
    {
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
}
