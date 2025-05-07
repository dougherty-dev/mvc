<?php

/**
 * Entity class for ORM Book in BookRepository library.
 * DB field definitions. Getters and setters.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * The Book class.
 */
#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column(length: 13)]
    private ?string $isbn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

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
     * Getter for title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Setter for title.
     */
    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Getter for author.
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * Setter for author.
     */
    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Getter for ISBN.
     */
    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    /**
     * Setter for ISBN.
     */
    public function setIsbn(string $isbn): static
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Getter for image.
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Setter for image.
     */
    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
