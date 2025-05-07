<?php

/**
 * Card ssession controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Cards;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Cards\Deck;

/**
 * The CardSessionController class.
 */
class CardSessionController extends CardSessionDeckController
{
    /**
     * Helper function to handle the session.
     */
    protected function checkSession(): void
    {
        $this->session = $this->requestStack->getSession();
        $this->deck = new Deck();

        $this->session->get("deck_values") or $this->newDeckValues();
        $this->session->get("deck") or $this->newSessionDeck();

        if ($this->session->get("deck") instanceof Deck) {
            $this->deck = $this->session->get("deck");
        }
    }
}
