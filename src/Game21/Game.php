<?php

/**
 * Game class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Cards\Deck;
use RangeException;

define('CARDSUIT', 13);
define('TWENTY_ONE', 21);
define('WILD_MIN', 1);
define('WILD_MAX', 14);
define('BANK_MAX', 17);
define('BANK_MAX_PERCENTAGE_INTELLIGENCE', 60);
define('DECK_MAX', 51);
define('BALANCE_DEFAULT', 100);

/** Define methods for the Game class. */
class Game
{
    public const STATES = [
        'player_initiates' => '⇦ Spelare inleder',
        'player_bets' => '⇦ Spelare satsar',
        'player_draws' => '⇦ Spelare drar',
        'player_busted' => 'Spelare tjock',
        'bank_busted' => 'Bank tjock',
        'player_wins' => 'Spelare vinner',
        'bank_wins' => 'Bank vinner',
        'game_over' => 'Spel slut'
    ];

    public Deck $deck;
    /** @var Player[] */
    public array $players = [];

    public function __construct(
        private string $state = self::STATES['player_initiates'],
        private string $bankIntelligence = '',
        private string $showDeck = '',
        /** @var int[] */
        private array $cardStats = [0, 0]
    ) {
        if (
            $this->cardStats[0] < 0 ||
            $this->cardStats[0] > 100 ||
            $this->cardStats[1] < 0 ||
            $this->cardStats[1] > 100
        ) {
            throw new RangeException('Sannolikheter utanför tillåtna gränser');
        }
        $this->init();
    }

    /** Initiate players and states in game. */
    public function init(): void
    {
        $this->__set('state', self::STATES['player_initiates']);
        $this->cardStats = [0, 0];
        $this->players = [new Player(), new Player()];
        $this->deck = new Deck();
        $this->deck->resetDeck();
    }

    /** Magic get. */
    public function __get(string $key): mixed
    {
        return $this->$key;
    }

    /** Magic isset. */
    public function __isset(string $key): bool
    {
        return isset($this->$key);
    }

    /** Magic set. */
    public function __set(string $key, mixed $value)
    {
        $this->$key = $value;
    }
}
