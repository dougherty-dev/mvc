<?php

/**
 * Entity class for ORM DB layer Players in PlayersRepository poker.
 * DB field definitions.
 * Getters and setters.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Entity;

use App\Repository\PlayersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Players for ORM DB layer.
 *
 * Note: dromedarCase not used in SQL.
 * @SuppressWarnings("CamelCase")
 */
#[ORM\Entity(repositoryClass: PlayersRepository::class)]
class Players
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /**
     * @phpstan-ignore-next-line
     */
    private ?int $id = null;

    /**
     * handle: player id, here just [0, 1, 2].
     */
    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $handle = null;

    /**
     * @var int[] $hand
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private array $hand = [];

    /**
     * cash: how much money a player has.
     */
    #[ORM\Column]
    private ?int $cash = null;

    /**
     * bet: the current total bet for a player.
     */
    #[ORM\Column]
    private ?int $bet = null;

    /**
     * latest action: numerical index for a set of states.
     */
    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $latest_action = null;

    /**
     * dealer: whether a player is dealer.
     */
    #[ORM\Column]
    private ?bool $dealer = null;

    /**
     * small_blind: whether a player has the small blind.
     */
    #[ORM\Column]
    private ?bool $small_blind = null;

    /**
     * big_blind: whether a player has the big blind.
     */
    #[ORM\Column]
    private ?bool $big_blind = null;

    /**
     * Getter for ID.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for handle.
     */
    public function getHandle(): ?int
    {
        return $this->handle;
    }

    /**
     * Setter for handle.
     */
    public function setHandle(int $handle): static
    {
        $this->handle = $handle;

        return $this;
    }

    /**
     * Getter for hand.
     * @return int[]
     */
    public function getHand(): array
    {
        return $this->hand;
    }

    /**
     * Setter for hand.
     * @param int[] $hand
     */
    public function setHand(array $hand): static
    {
        $this->hand = $hand;

        return $this;
    }

    /**
     * Getter for cash.
     */
    public function getCash(): ?int
    {
        return $this->cash;
    }

    /**
     * Setter for cash.
     */
    public function setCash(int $cash): static
    {
        $this->cash = $cash;

        return $this;
    }

    /**
     * Getter for bet.
     */
    public function getBet(): ?int
    {
        return $this->bet;
    }

    /**
     * Setter for bet.
     */
    public function setBet(int $bet): static
    {
        $this->bet = $bet;

        return $this;
    }

    /**
     * Getter for latest_action.
     */
    public function getLatestAction(): ?int
    {
        return $this->latest_action;
    }

    /**
     * Setter for latest_action.
     */
    public function setLatestAction(int $latest_action): static
    {
        $this->latest_action = $latest_action;

        return $this;
    }

    /**
     * Getter for dealer.
     */
    public function isDealer(): ?bool
    {
        return $this->dealer;
    }

    /**
     * Setter for dealer.
     */
    public function setDealer(bool $dealer): static
    {
        $this->dealer = $dealer;

        return $this;
    }

    /**
     * Getter for small_blind.
     */
    public function isSmallBlind(): ?bool
    {
        return $this->small_blind;
    }

    /**
     * Setter for small_blind.
     */
    public function setSmallBlind(bool $small_blind): static
    {
        $this->small_blind = $small_blind;

        return $this;
    }

    /**
     * Getter for big_blind.
     */
    public function isBigBlind(): ?bool
    {
        return $this->big_blind;
    }

    /**
     * Setter for big_blind.
     */
    public function setBigBlind(bool $big_blind): static
    {
        $this->big_blind = $big_blind;

        return $this;
    }
}
