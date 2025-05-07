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
 * The CardSessionDeckController class.
 */
class CardSessionDeckController extends AbstractController
{
    protected Deck $deck;
    protected SessionInterface $session;

    public function __construct(protected RequestStack $requestStack)
    {
    }

    /**
     * Protected method for initiating deck values in session.
     */
    protected function newDeckValues(): void
    {
        $deck = new Deck();
        $deck->resetDeck();

        $this->session->set("deck_values", $deck->deckValues());
        $this->session->set("deck_text_values", $deck->deckTextValues());
    }

    /**
     * Protected method for initiating deck in session.
     */
    protected function newSessionDeck(): void
    {
        $this->deck->resetDeck();
        $this->deck->shuffleDeck();

        $this->session->set("deck", $this->deck);
    }
}
