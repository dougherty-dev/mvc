<?php

/**
 * Card controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Cards;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Cards\Hand;

/**
 * The CardDealController class.
 */
class CardDealController extends CardSessionController
{
    /**
     * The route for dealing cards to player.
     */
    #[Route("/card/deck/deal/{players<\d+>}/{cards<\d+>}", name: "card_deck_draw_deal_players")]
    public function cardDeckDealPlayersCards(int $players = 0, int $cards = 0): Response
    {
        $this->checkSession();

        $hands = array_map(fn (): Hand => $this->deck->drawCards($cards), range(0, $players - 1));
        $this->session->set("deck", $this->deck);

        $data = [
            'players' => $players,
            'cards' => $cards,
            'hands' => $hands,
            'remaining' => $this->deck->remainingCards()
        ];

        return $this->render('card/deal.html.twig', $data);
    }
}
