<?php

/**
 * Library process controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Library;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Repository\BookRepository;

/**
 * The default booklist constant array.
 */
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

/**
 * The LibraryResetController class.
 */
class LibraryResetController extends AbstractController
{
    /**
     * Route for resetting library.
     */
    #[Route('/library/reset/post', name: 'library_reset_post', methods: ['POST'])]
    public function libraryResetPost(ManagerRegistry $doctrine, BookRepository $bookRepository): Response
    {
        $bookRepository->truncateTable();
        $entityManager = $doctrine->getManager();

        foreach (BOOKLIST as $book) {
            $vol = new Book();
            $vol->setTitle($book['title'])
                ->setAuthor($book['author'])
                ->setIsbn($book['isbn'])
                ->setImage($book['image']);

            $entityManager->persist($vol);
            $entityManager->flush();
        }

        $this->addFlash('notice', 'Biblioteket återställdes.');

        return $this->redirectToRoute('library_view');
    }
}
