<?php

/**
 * Enum Suit.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

/**
 * The Suits enumeration.
 */
enum Suits: string
{
    case Clubs =    'C';
    case Diamonds = 'D';
    case Hearts =   'H';
    case Spades =   'S';

    public function suitSymbol(): string
    {
        return match($this) {
            Suits::Clubs =>    '♣️',
            Suits::Diamonds => '♦️',
            Suits::Hearts =>   '♥️',
            Suits::Spades =>   '♠️',
        };
    }

    public function suitText(): string
    {
        return match($this) {
            Suits::Clubs =>    'klöver ',
            Suits::Diamonds => 'ruter ',
            Suits::Hearts =>   'hjärter ',
            Suits::Spades =>   'spader ',
        };
    }
}
