<?php

/**
 * PermuteHands class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\Round;

use App\Poker\Helpers\UpdatePlayer;
use App\Poker\Community;
use App\Poker\Player;
use App\Poker\Card;
use App\Poker\Hand;
use App\Poker\PokerHand\PokerHandCombinations;
use App\Poker\PokerHand\PokerHandValue;

/**
 * The PermuteHands class.
 * @SuppressWarnings("StaticAccess")
 */
class PermuteHands
{
    /** @var array<int, int[]> */
    private array $permutations;
    private PokerHandValue $pokerHand;
    private string $bestHex = "";

    public function __construct()
    {
        $this->permutations = (new PokerHandCombinations())->permuteHand();
        $this->pokerHand = new PokerHandValue();
    }
    /**
     * Decide winner, pay out and reset community pot, save results in session for display.
     * @param string[] $bestHand
     * @return string[]
     */
    public function permute(
        Community $community,
        Player $player,
        UpdatePlayer $updatePlayer,
        array $bestHand
    ): array {
        $hand = $player->getHand();
        $hand->addToHand(array_merge($community->getHand()->handIntValues(), $hand->handIntValues()));
        $updatePlayer->saveHand($player->getId(), $hand->handIntValues());
        $handValues = $hand->handIntValues();

        foreach ($this->permutations as $permutation) {
            $temphand = new Hand();
            array_map(fn ($card): null => $temphand->addCard(new Card($handValues[$card])), $permutation);

            $hex = $this->pokerHand->checkHand($temphand);
            if ($hex > $this->bestHex) {
                $this->bestHex = $hex;
                $bestHand = [
                    "id" => (string) $player->getId(),
                    "handle" => (string) $player->getHandle(),
                    "hex" => $hex
                ];
            }
        }

        return $bestHand;
    }
}
