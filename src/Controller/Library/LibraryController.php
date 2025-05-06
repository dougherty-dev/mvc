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
use App\Repository\BookRepository;

/**
 * The LibraryController class.
 */
class LibraryController extends AbstractController
{
    /**
     * Display library main page
     */
    #[Route("/library", name: "library")]
    public function library(): Response
    {
        return $this->render('book/library.html.twig');
    }

    /**
     * Display page for editing book.
     */
    #[Route('/library/edit/{id}', name: 'library_edit_id')]
    public function libraryEditID(BookRepository $bookRepository, int $id): Response
    {
        $book = $bookRepository->find($id);

        if (!$book) {
            $this->addFlash('notice', 'Bok med ID ' . $id . ' finns inte.');
            return $this->redirectToRoute('library_view');
        }

        return $this->render('book/edit.html.twig', ['book' => $book]);
    }

    /**
     * Display page for adding new book.
     */
    #[Route("/library/new", name: "library_new")]
    public function libraryNew(): Response
    {
        return $this->render('book/new.html.twig');
    }

    /**
     * Display page for reseting library.
     */
    #[Route("/library/reset", name: "library_reset")]
    public function libraryReset(): Response
    {
        return $this->render('book/reset.html.twig');
    }
}
