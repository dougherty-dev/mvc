<?php

/**
 * Library process controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;

class LibraryProcessController extends AbstractController
{
    #[Route('/library/create', name: 'library_create')]
    public function libraryCreate(
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $book = new Book();
        // $book->setName('Keyboard_num_' . rand(1, 9));
        // $book->setValue(rand(100, 999));

        $entityManager->persist($book);
        $entityManager->flush();

        return new Response('Lade till ny bok med ID ' . $book->getId());
    }

    #[Route('/library/show', name: 'library_show')]
    public function libraryShow(
        BookRepository $bookRepository
    ): Response {
        $books = $bookRepository->findAll();

        $response = $this->json($books);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
        return $response;
    }

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

        return $this->redirectToRoute('library_view');
    }

    #[Route('/library/update', name: 'library_update')]
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

        return $this->redirectToRoute('library_view_id', ['id' => $form['id']]);
    }

    #[Route('/library/update/title/{id}/{value}', name: 'library_update_title')]
    public function libraryUpdateTitle(
        ManagerRegistry $doctrine,
        int $id,
        string $value
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'Ingen bok med ID ' . $id
            );
        }

        $book->setTitle($value);
        $entityManager->flush();

        return $this->redirectToRoute('library_show');
    }

    #[Route('/library/reset', name: 'library_reset_post', methods: ['POST'])]
    public function libraryResetPost(
        ManagerRegistry $doctrine,
        BookRepository $bookRepository
    ): Response {
        $entityManager = $doctrine->getManager();
        $bookRepository->truncateTable();

        $bookList = [
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
        ];

        foreach ($bookList as $book) {
            $vol = new Book();
            $vol->setTitle($book['title'])
                ->setAuthor($book['author'])
                ->setIsbn($book['isbn'])
                ->setImage($book['image']);

            $entityManager->persist($vol);
            $entityManager->flush();
        }

        return $this->redirectToRoute('library_view');
    }
}
