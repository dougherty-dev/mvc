<?php

/**
 * Card ssession controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Cards\Deck;

/**
 * The CardSessionController class.
 */
class CardSessionController extends AbstractController
{
    protected Deck $deck;
    protected SessionInterface $session;

    public function __construct(protected RequestStack $requestStack)
    {
    }

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

    /**
     * Private method for initiating deck values in session.
     */
    private function newDeckValues(): void
    {
        $deck = new Deck();
        $deck->resetDeck();

        $this->session->set("deck_values", $deck->deckValues());
        $this->session->set("deck_text_values", $deck->deckTextValues());
    }

    /**
     * Private method for initiating deck in session.
     */
    private function newSessionDeck(): void
    {
        $this->deck->resetDeck();
        $this->deck->shuffleDeck();

        $this->session->set("deck", $this->deck);
    }
}
