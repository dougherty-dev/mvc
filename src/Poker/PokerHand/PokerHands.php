<?php

/**
 * Enum PokerHands.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker\PokerHand;

/**
 * The PokerHands enumeration.
 */
enum PokerHands: int
{
    case HighCard       = 0;
    case Pair           = 1;
    case TwoPairs       = 2;
    case ThreeOfAKind   = 3;
    case Straight       = 4;
    case Flush          = 5;
    case FullHouse      = 6;
    case FourOfAKind    = 7;
    case StraightFlush  = 8;

    public function text(): string
    {
        return match ($this) {
            PokerHands::HighCard        => 'högt kort',
            PokerHands::Pair            => 'par',
            PokerHands::TwoPairs        => 'tvåpar',
            PokerHands::ThreeOfAKind    => 'triss',
            PokerHands::Straight        => 'stege',
            PokerHands::Flush           => 'färg',
            PokerHands::FullHouse       => 'kåk',
            PokerHands::FourOfAKind     => 'fyrtal',
            PokerHands::StraightFlush   => 'färgstege'
        };
    }

    public function string(): string
    {
        return match ($this) {
            PokerHands::HighCard        => '11111',
            PokerHands::Pair            => '2111',
            PokerHands::TwoPairs        => '221',
            PokerHands::ThreeOfAKind    => '311',
            PokerHands::Straight        => '11111',
            PokerHands::Flush           => '11111',
            PokerHands::FullHouse       => '32',
            PokerHands::FourOfAKind     => '41',
            PokerHands::StraightFlush   => '11111'
        };
    }
}
