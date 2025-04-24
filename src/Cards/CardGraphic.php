<?php

/**
 * Extended card class.
 * Author: nido24
 */

declare(strict_types=1);

namespace App\Cards;

/** Extend basic Card class with methods for string representations and constants. */
class CardGraphic extends Card
{
    private const SUIT = [
        '♣️ klöver', '♦️ ruter', '♥️ hjärter', '♠️ spader', '🃏 joker'
    ];

    private const FACES = [
        'ess', 'två', 'tre', 'fyra', 'fem', 'sex', 'sju',
        'åtta', 'nio', 'tio', 'knekt', 'dam', 'kung',
    ];

    public const DECK_ARRAY = [
        '🃑', '🃒', '🃓', '🃔', '🃕', '🃖', '🃗', '🃘', '🃙', '🃚', '🃛', '🃝', '🃞',
        '🃁', '🃂', '🃃', '🃄', '🃅', '🃆', '🃇', '🃈', '🃉', '🃊', '🃋', '🃍', '🃎',
        '🂡', '🂢', '🂣', '🂤', '🂥', '🂦', '🂧', '🂨', '🂩', '🂪', '🂫', '🂭', '🂮',
        '🂱', '🂲', '🂳', '🂴', '🂵', '🂶', '🂷', '🂸', '🂹', '🂺', '🂻', '🂽', '🂾',
        '🃟', '🃟'
    ];

    /** Returns a Unicode symbolic representation of a card face. */
    public function getStringValue(): string
    {
        return self::DECK_ARRAY[$this->getValue()];
    }

    /** Returns a textual and symbolic representation of a card face. */
    public function getTextValue(): string
    {
        $suit = self::SUIT[intdiv(intval($this->getValue()), 13)];
        $face = $this->getValue() > 51 ? '' : self::FACES[$this->getValue() % 13];
        return trim("$suit $face");
    }
}
