<?php

/**
 * Poker session controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Poker\FaceMethods;
use App\Poker\Deck;
use App\Poker\Hand;
use App\Poker\Card;
use App\Poker\PokerTableSeats;

/**
 * The PokerSessionController class.
 * @SuppressWarnings("StaticAccess")
 */
class PokerSessionController extends AbstractController
{
    protected Deck $deck;
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
        if (!$this->session->get("deck")) {
            $this->newSessionGame();
        }
        $this->newSessionGame();
        // $this->game = new GameActions();
        // if ($this->session->get("game") instanceof GameActions) {
        //     $this->game = $this->session->get("game");
        // }
    }

    /**
     * Private method for initiating session.
     */
    private function newSessionGame(): void
    {
        $deck = new Deck();
        $deck->resetDeck();

        $this->session->set("deckFaceValues", FaceMethods::deckFaceValues());
        $this->session->set("deckUnicodeValues", FaceMethods::deckUnicodeValues());
        $this->session->set("deckSymbolValues", FaceMethods::deckSymbolValues());
        $this->session->set("deckTextValues", FaceMethods::deckTextValues());

        $deck->shuffleDeck();
        $this->session->set("deck", $deck);

        $hand = new Hand();
        $hand->addCard(new Card(0));
        $hand->addCard(new Card(1));
        $hand->addCard(new Card(2));
        $this->session->set("hand", $hand);
        $handFaceValues = $hand->handUnicodeValues();
        $this->session->set("handFaceValues", $handFaceValues);

        $hand2 = $deck->drawCards(5);
        $handFaceValues = $hand2->handFaceValues();
        $this->session->set("handFaceValues2", $handFaceValues);
        $handSymbolValues = $hand2->handSymbolValues();
        $this->session->set("handSymbolValues", $handSymbolValues);
    }
}
