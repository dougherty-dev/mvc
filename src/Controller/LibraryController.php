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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;

class LibraryController extends AbstractController
{
    #[Route("/library", name: "library")]
    public function library(): Response
    {
        return $this->render('book/library.html.twig');
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

    #[Route('/library/show/{id}', name: 'library_show_id')]
    public function libraryShowID(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository->find($id);

        $response = $this->json($book);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
        return $response;
    }

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

    #[Route('/library/view/{id}', name: 'library_view_id')]
    public function libraryViewID(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository->find($id);

        $data = [
            'book' => $book
        ];

        return $this->render('book/view_single.html.twig', $data);
    }

    #[Route("/library/reset", name: "library_reset", methods: ['GET'])]
    public function libraryReset(): Response
    {
        return $this->render('book/reset.html.twig');
    }
}
