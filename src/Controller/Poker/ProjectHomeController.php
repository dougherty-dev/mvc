<?php

/**
 * Project home controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The ProjectHomeController class.
 */
class ProjectHomeController extends PokerSessionController
{
    /**
     * The route for the project home page.
     */
    #[Route("/proj", name: "proj")]
    public function proj(): Response
    {
        return $this->render('poker/proj.html.twig');
    }

    /**
     * The route for the project about page.
     */
    #[Route("/proj/about", name: "proj_about")]
    public function projAbout(): Response
    {
        return $this->render('poker/about.html.twig');
    }

    /**
     * The route for the poker game page.
     */
    #[Route("/proj/poker", name: "proj_poker")]
    public function projPoker(): Response
    {
        $this->checkSession();
        return $this->render('poker/poker.html.twig');
    }
}
