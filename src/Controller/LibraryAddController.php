<?php

/**
 * Library process controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;

/** The LibraryAddController class. */
class LibraryAddController extends AbstractController
{
    /** Process form data for new book. */
    #[Route('/library/new/post', name: 'library_new_post', methods: ['POST'])]
    public function libraryNewPost(
        Request $request,
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();
        $form = $request->request->all();

        $book = new Book();
        $book->setTitle($form['title'])
            ->setAuthor($form['author'])
            ->setIsbn($form['isbn']);

        $entityManager->persist($book);
        $entityManager->flush();

        $this->addFlash(
            'notice',
            'Lade till boken ' . $form['title']
        );

        return $this->redirectToRoute('library_view_id', ['id' => $book->getId()]);
    }
}
