<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Cards\Deck;

class SessionController extends CardController
{
    /** @var RequestStack $requestStack */
    protected $requestStack;

    #[Route("session", name: "session")]
    public function session(): Response
    {
        return $this->render('session.html.twig');
    }

    #[Route("session/delete", name: "session_delete")]
    public function sessionDelete(): Response
    {
        $session = $this->requestStack->getSession();
        $session->clear();
        $this->addFlash(
            'notice',
            'Sessionen raderades.'
        );

        return $this->redirectToRoute('session');
    }
}
