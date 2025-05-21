<?php

/**
 * FindBestHand class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Helpers;

use App\Poker\Card;
use App\Poker\Hand;
use App\Poker\Player;
use App\Poker\PlayerStates;
use App\Poker\Community;
use App\Poker\PokerHand\PokerHands;
use App\Poker\PokerHand\PokerHandValue;
use App\Poker\PokerHand\PokerHandCombinations;

/**
 * The FindBestHand class.
 */
class FindBestHand
{
    /**
     * Select best hand given seven cards in total.
     * @param Player[] $players
     * @return mixed[]
     */
    public function find(
        array $players,
        Community $community
    ): array {
        $bestHand = [];
        $bestHex = "";

        $permutations = (new PokerHandCombinations())->permuteHand();
        $pokerHand = new PokerHandValue();

        /**
         * Loop over all active players.
         */
        foreach ($players as $player) {
            if (in_array($player->getState(), [PlayerStates::Folds, PlayerStates::Out])) {
                continue;
            }

            $hand = $player->getHand();
            $hand->addToHand(array_merge($community->getHand()->handIntValues(), $hand->handIntValues()));
            $handValues = $hand->handIntValues();

            /**
             * Iterate over all 21 permutations, and upgrade best score.
             */
            foreach ($permutations as $permutation) {
                $temphand = new Hand();
                array_map(fn ($card): null => $temphand->addCard(new Card($handValues[$card])), $permutation);

                $hex = $pokerHand->checkHand($temphand);
                if ($hex > $bestHex) {
                    $bestHex = $hex;
                    $bestHand = [
                        "handle" => (string) $player->getHandle(),
                        "hand" => $temphand->handSymbolValues(),
                        "hex" => $hex,
                        "value" => PokerHands::from(intval($hex[1]))->text()
                    ];
                }
            }
        }

        return $bestHand;
    }
}
