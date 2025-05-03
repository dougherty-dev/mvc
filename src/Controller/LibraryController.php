<?php

/**
 * Library controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;

class LibraryController extends AbstractController
{
    #[Route("/library", name: "library")]
    public function library(): Response
    {
        return $this->render('book/library.html.twig', [
            'controller_name' => 'LibraryController',
        ]);
    }

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

        $response = new JsonResponse($books);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route('/library/show/{id}', name: 'library_show_id')]
    public function libraryShowID(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository->find($id);

        $response = new JsonResponse($book);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
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

        return $this->redirectToRoute('library_show');
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

    #[Route('/library/view', name: 'library_view')]
    public function libraryView(
        BookRepository $productRepository
    ): Response {
        $books = $productRepository->findAll();

        $data = [
            'books' => $books
        ];

        return $this->render('book/view.html.twig', $data);
    }
}
