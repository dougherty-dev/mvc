<?php

/**
 * Extended card class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Cards;

/**
 * Extend basic Card class with methods for string representations and constants.
 */
class CardGraphic extends Card
{
    /**
     * Suit definition, plus joker.
     */
    private const SUIT = [
        '♣️ klöver', '♦️ ruter', '♥️ hjärter', '♠️ spader', '🃏 joker'
    ];

    /**
     * All face names of the deck.
     */
    private const FACES = [
        'ess', 'två', 'tre', 'fyra', 'fem', 'sex', 'sju',
        'åtta', 'nio', 'tio', 'knekt', 'dam', 'kung',
    ];

    /**
     * Unicode representations of cards in deck.
     */
    public const DECK_ARRAY = [
        '🃑', '🃒', '🃓', '🃔', '🃕', '🃖', '🃗', '🃘', '🃙', '🃚', '🃛', '🃝', '🃞',
        '🃁', '🃂', '🃃', '🃄', '🃅', '🃆', '🃇', '🃈', '🃉', '🃊', '🃋', '🃍', '🃎',
        '🂡', '🂢', '🂣', '🂤', '🂥', '🂦', '🂧', '🂨', '🂩', '🂪', '🂫', '🂭', '🂮',
        '🂱', '🂲', '🂳', '🂴', '🂵', '🂶', '🂷', '🂸', '🂹', '🂺', '🂻', '🂽', '🂾',
        '🃟', '🃟'
    ];

    /**
     * Returns a Unicode symbolic representation of a card face.
     */
    public function getStringValue(): string
    {
        return self::DECK_ARRAY[$this->getValue()];
    }

    /**
     * Returns a textual and symbolic representation of a card face.
     */
    public function getTextValue(): string
    {
        $suit = self::SUIT[intdiv(intval($this->getValue()), 13)];
        $face = $this->getValue() > 51 ? '' : self::FACES[$this->getValue() % 13];
        return trim("$suit $face");
    }
}
