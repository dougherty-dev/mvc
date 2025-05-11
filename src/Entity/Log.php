<?php

/**
 * Entity class for ORM Log in LogRepository poker.
 * DB field definitions. Getters and setters.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Entity;

use App\Repository\LogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogRepository::class)]
class Log
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $event = null;

    #[ORM\Column]
    private ?\DateTime $time = null;

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
     * Getter for event.
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }

    /**
     * Setter for event.
     */
    public function setEvent(string $event): static
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Getter for time.
     */
    public function getTime(): ?\DateTime
    {
        return $this->time;
    }

    /**
     * Setter for time.
     */
    public function setTime(\DateTime $time): static
    {
        $this->time = $time;

        return $this;
    }
}
