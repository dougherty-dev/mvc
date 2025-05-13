<?php

/**
 * Entity class for ORM Community in CommunityRepository poker.
 * DB field definitions. Getters and setters.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Entity;

use App\Repository\CommunityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Players for ORM DB layer.
 *
 * Note: dromedarCase not used in SQL.
 * @SuppressWarnings("CamelCase")
 */
#[ORM\Entity(repositoryClass: CommunityRepository::class)]
class Community
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $status = null;

    /**
     * @var int[] $deck
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private array $deck = [];

    /**
     * @var int[] $discarded
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private array $discarded = [];

    /**
     * @var int[] $hand
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private array $hand = [];

    #[ORM\Column]
    private ?int $pot = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $raises = null;

    /**
     * Getter for ID.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Setter for ID.
     */
    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Getter for status.
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * Setter for status.
     */
    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Getter for deck.
     * @return int[]
     */
    public function getDeck(): array
    {
        return $this->deck;
    }

    /**
     * Setter for deck.
     * @param int[] $deck
     */
    public function setDeck(array $deck): static
    {
        $this->deck = $deck;

        return $this;
    }

    /**
     * Getter for discarded.
     * @return int[]
     */
    public function getDiscarded(): array
    {
        return $this->discarded;
    }

    /**
     * Setter for discarded.
     * @param int[] $discarded
     */
    public function setDiscarded(array $discarded): static
    {
        $this->discarded = $discarded;

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
     * Getter for pot.
     */
    public function getPot(): ?int
    {
        return $this->pot;
    }

    /**
     * Setter for pot.
     */
    public function setPot(int $pot): static
    {
        $this->pot = $pot;

        return $this;
    }

    /**
     * Getter for raises.
     */
    public function getRaises(): ?int
    {
        return $this->raises;
    }

    /**
     * Setter for raises.
     */
    public function setRaises(int $raises): static
    {
        $this->raises = $raises;

        return $this;
    }
}
