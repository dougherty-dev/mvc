<?php

/**
 * SessionController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Poker\Faces;
use App\Poker\FaceMethods;

/**
 * The SessionController class.
 * @SuppressWarnings("StaticAccess")
 */
class SessionController extends AbstractController
{
    protected SessionInterface $session;

    public function __construct(protected RequestStack $requestStack)
    {
    }

    /**
     * Protected method for handling session data.
     */
    protected function checkSession(): void
    {
        $this->session = $this->requestStack->getSession();
        if (!$this->session->get("deckFaceValues")) {
            $this->session->set("deckIntValues", array_keys(Faces::UNICODE_FACE_ARRAY));
            $this->session->set("deckFaceValues", FaceMethods::deckFaceValues());
            $this->session->set("deckUnicodeValues", FaceMethods::deckUnicodeValues());
            $this->session->set("deckSymbolValues", FaceMethods::deckSymbolValues());
            $this->session->set("deckTextValues", FaceMethods::deckTextValues());
        }
    }
}
