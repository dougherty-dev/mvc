<?php

/**
 * Library process controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Library;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;

/**
 * The LibraryDeleteController class.
 */
class LibraryDeleteController extends AbstractController
{
    /**
     * POST route for deleting book.
     */
    #[Route('/library/delete', name: 'library_delete', methods: ['POST'])]
    public function libraryDelete(Request $request, ManagerRegistry $doctrine): Response
    {
        $form = $request->request->all();

        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($form['id']);

        if (!$book) {
            $this->addFlash('notice', 'Bok med ID ' . $form['id'] . ' finns inte.');
            return $this->redirectToRoute('library_view');
        }

        $entityManager->remove($book);
        $entityManager->flush();

        $this->addFlash('notice', 'Boken "' . $book->getTitle() . '" raderades.');

        return $this->redirectToRoute('library_view');
    }

    /**
     * Route for displaying page for deleting book.
     */
    #[Route("/library/delete/confirm", name: "library_delete_confirm", methods: ['POST'])]
    public function libraryDeleteConfirm(Request $request): Response
    {
        $form = $request->request->all();
        return $this->render('book/delete.html.twig', ['id' => $form["id"]]);
    }
}
