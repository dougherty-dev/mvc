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
use App\Repository\BookRepository;

define('BOOKLIST', [
    [
        'title' => 'Klara and the Sun',
        'author' => 'Ishiguro Kazuo (石黒一雄)',
        'isbn' => '9780571364879',
        'image' => '9780571364879-ishiguro-kazuo-klara-and-the-sun'
    ],
    [
        'title' => 'Coraline',
        'author' => 'Neil Gaiman',
        'isbn' => '9780380807345',
        'image' => '9780380807345-neil-gaiman-coraline'
    ],
    [
        'title' => '三体',
        'author' => '刘慈欣',
        'isbn' => '9787536692930',
        'image' => '9787536692930-liu-cixin-santi'
    ],
    [
        'title' => 'El cuaderno de Maya',
        'author' => 'Isabel Allende',
        'isbn' => '9780307947949',
        'image' => '9780307947949-isabel-allende-el-cuaderno-de-maya'
    ],
    [
        'title' => 'La poupée de porcelaine',
        'author' => 'Maxence Fermine',
        'isbn' => '9782876837539',
        'image' => '9782876837539-maxence-fermine-la-poupee-de-porcelaine'
    ],
]);

class LibraryProcessController extends AbstractController
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

    /** Delete book. */
    #[Route('/library/delete/{id}', name: 'library_delete_id')]
    public function libraryDeleteID(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'Ingen bok med ID ' . $id
            );
        }

        $entityManager->remove($book);
        $entityManager->flush();

        $this->addFlash(
            'notice',
            'Boken "' . $book->getTitle() . '" raderades.'
        );

        return $this->redirectToRoute('library_view');
    }

    /** Process form data for existing book. */
    #[Route('/library/update', name: 'library_update', methods: ['POST'])]
    public function libraryUpdate(
        Request $request,
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();
        $form = $request->request->all();

        $book = $entityManager->getRepository(Book::class)->find($form['id']);
        if (!$book) {
            throw $this->createNotFoundException(
                'Ingen bok med ID ' . $form['id']
            );
        }

        if (isset($form['delete'])) {
            return $this->redirectToRoute('library_delete_id', ['id' => $form['id']]);
        }

        $book->setTitle($form['title'])
            ->setAuthor($form['author'])
            ->setIsbn($form['isbn']);
        $entityManager->flush();

        $this->addFlash(
            'notice',
            'Bokdata uppdaterades för "' . $form['title'] . '".'
        );

        return $this->redirectToRoute('library_view_id', ['id' => $form['id']]);
    }

    /** Reset library. */
    #[Route('/library/reset/post', name: 'library_reset_post', methods: ['POST'])]
    public function libraryResetPost(
        ManagerRegistry $doctrine,
        BookRepository $bookRepository
    ): Response {
        $entityManager = $doctrine->getManager();
        $bookRepository->truncateTable();

        foreach (BOOKLIST as $book) {
            $vol = new Book();
            $vol->setTitle($book['title'])
                ->setAuthor($book['author'])
                ->setIsbn($book['isbn'])
                ->setImage($book['image']);

            $entityManager->persist($vol);
            $entityManager->flush();
        }

        $this->addFlash(
            'notice',
            'Biblioteket återställdes.'
        );

        return $this->redirectToRoute('library_view');
    }
}
