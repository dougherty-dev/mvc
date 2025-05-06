<?php

/**
 * Game class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Game21;

use App\Cards\Deck;

/** Define methods for the Game class. */
class Game extends GameFoundation
{
    public Deck $deck;
    /** @var Player[] */
    public array $players = [];
    /** @var int[] */
    protected array $cardStats = [0, 0];

    public function __construct(
        protected string $state = self::STATES['player_initiates'],
        protected string $bankIntelligence = '',
        protected string $showDeck = ''
    ) {
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
}
