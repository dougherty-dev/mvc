<?php

/**
 * Enum Faces.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Poker;

use App\Poker\Suits;

/**
 * The Faces enumeration.
 */
enum Faces: string
{
    public const UNICODE_FACE_ARRAY = [
        '🃑', '🃒', '🃓', '🃔', '🃕', '🃖', '🃗', '🃘', '🃙', '🃚', '🃛', '🃝', '🃞',
        '🃁', '🃂', '🃃', '🃄', '🃅', '🃆', '🃇', '🃈', '🃉', '🃊', '🃋', '🃍', '🃎',
        '🂡', '🂢', '🂣', '🂤', '🂥', '🂦', '🂧', '🂨', '🂩', '🂪', '🂫', '🂭', '🂮',
        '🂱', '🂲', '🂳', '🂴', '🂵', '🂶', '🂷', '🂸', '🂹', '🂺', '🂻', '🂽', '🂾'
    ];

    case Two =      '2';
    case Three =    '3';
    case Four =     '4';
    case Five =     '5';
    case Six =      '6';
    case Seven =    '7';
    case Eight =    '8';
    case Nine =     '9';
    case Ten =      '10';
    case Jack =     'J';
    case Queen =    'Q';
    case King =     'K';
    case Ace =      'A';

    public function faceValue(): int
    {
        return match($this) {
            Faces::Two =>      2,
            Faces::Three =>    3,
            Faces::Four =>     4,
            Faces::Five =>     5,
            Faces::Six =>      6,
            Faces::Seven =>    7,
            Faces::Eight =>    8,
            Faces::Nine =>     9,
            Faces::Ten =>      10,
            Faces::Jack =>     11,
            Faces::Queen =>    12,
            Faces::King =>     13,
            Faces::Ace =>      14
        };
    }

    public function faceText(): string
    {
        return match($this) {
            Faces::Two =>      'två',
            Faces::Three =>    'tre',
            Faces::Four =>     'fyra',
            Faces::Five =>     'fem',
            Faces::Six =>      'sex',
            Faces::Seven =>    'sju',
            Faces::Eight =>    'åtta',
            Faces::Nine =>     'nio',
            Faces::Ten =>      'tio',
            Faces::Jack =>     'knekt',
            Faces::Queen =>    'dam',
            Faces::King =>     'kung',
            Faces::Ace =>      'ess'
        };
    }
}
