<?php

declare(strict_types=1);

namespace App\Cards;

use App\Cards;

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

    public function __construct(?int $value = null)
    {
        parent::__construct($value);
    }

    public function getStringValue(): string
    {
        return self::DECK_ARRAY[$this->value];
    }

    public function getTextValue(): string
    {
        $suit = self::SUIT[intdiv(intval($this->value), 13)];
        $face = $this->value > 51 ? '' : self::FACES[$this->value % 13];
        return trim("$suit $face");
    }
}
