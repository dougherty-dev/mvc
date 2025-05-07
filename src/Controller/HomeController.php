<?php

/**
 * Home controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The HomeController class.
 */
class HomeController extends AbstractController
{
    /**
     * The route for the home page.
     */
    #[Route("/", name: "home")]
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    /**
     * The route for the about page.
     */
    #[Route("/about", name: "about")]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }

    /**
     * The route for the report page.
     */
    #[Route("/report", name: "report")]
    public function report(): Response
    {
        return $this->render('report.html.twig');
    }

    /**
     * The route for the lucky page.
     */
    #[Route("/lucky", name: "lucky")]
    public function number(): Response
    {
        return $this->render('lucky.html.twig', ['number' => random_int(1, 46)]);
    }

    /**
     * The route for the API collection page.
     */
    #[Route("/api", name: "api")]
    public function api(): Response
    {
        return $this->render('api.html.twig');
    }

    /**
     * The route for the metrics page.
     */
    #[Route("/metrics", name: "metrics")]
    public function metrics(): Response
    {
        return $this->render('metrics.html.twig');
    }
}
