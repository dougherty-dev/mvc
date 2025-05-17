<?php

/**
 * HomeController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The HomeController class.
 */
class HomeController extends SessionController
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
     * The route for the poker session page.
     */
    #[Route("/proj/session", name: "proj_session")]
    public function projSession(): Response
    {
        return $this->render('poker/session.html.twig');
    }

    /**
     * The route for the poker reset page.
     */
    #[Route("/proj/reset", name: "proj_reset")]
    public function projReset(): Response
    {
        return $this->render('poker/reset.html.twig');
    }
}
