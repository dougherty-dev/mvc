<?php

/**
 * Library update controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;

/**
 * The LibraryUpdateController class.
 */
class LibraryUpdateController extends AbstractController
{
    /**
     * Process form data for existing book.
     */
    #[Route('/library/update', name: 'library_update', methods: ['POST'])]
    public function libraryUpdate(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $form = $request->request->all();

        $book = $entityManager->getRepository(Book::class)->find($form['id']);
        if (!$book) {
            $this->addFlash('notice', 'Bok med ID ' . $form['id'] . ' finns inte.');
            return $this->redirectToRoute('library_view');
        }

        $book->setTitle($form['title'])
            ->setAuthor($form['author'])
            ->setIsbn($form['isbn']);
        $entityManager->flush();

        $this->addFlash('notice', 'Bokdata uppdaterades för "' . $form['title'] . '".');

        return $this->redirectToRoute('library_view_id', ['id' => $form['id']]);
    }
}
