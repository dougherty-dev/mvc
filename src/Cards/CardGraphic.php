<?php

namespace App\Cards;

use App\Cards;

define('SUIT', [
    '♣️ klöver',
    '♦️ ruter',
    '♥️ hjärter',
    '♠️ spader',
    '🃏 joker'
]);

define('FACES', [
    'ess',
    'två',
    'tre',
    'fyra',
    'fem',
    'sex',
    'sju',
    'åtta',
    'nio',
    'tio',
    'knekt',
    'dam',
    'kung',
]);

class CardGraphic extends Card
{
    private const JOKERS = '🃟🃟';
    protected const DECK = parent::DECK . self::JOKERS;

    public function __construct($value)
    {
        parent::__construct($value);
    }

    public function getTextValue(int $value): string
    {
        $suit = SUIT[intdiv($value, 13)];
        $face = $suit === 'joker' ? '' : FACES[$value % 13];
        return trim("$suit $face");
    }
}
