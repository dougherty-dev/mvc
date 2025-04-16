<?php

declare(strict_types=1);

namespace App\Cards;

use App\Cards;

class Deck
{
    /** @var array<int, CardGraphic> $deck */
    private array $deck = [];

    public function resetDeck(): void
    {
        $this->deck = [];
        foreach (array_keys(CardGraphic::DECK_ARRAY) as $k) {
            $this->deck[] = new CardGraphic($k);
        }
    }

    /** @param int[] $values */
    public function addToDeck(array $values): void
    {
        $this->deck = [];
        foreach ($values as $k) {
            $this->deck[] = new CardGraphic($k);
        }
    }

    /** @return array<int, CardGraphic> */
    public function getDeck(): array
    {
        return $this->deck;
    }

    public function shuffleDeck(): void
    {
        shuffle($this->deck);
    }

    public function drawCards(int $number = 1): Hand
    {
        $hand = new Hand();
        $remaining = $this->remainingCards();
        for ($i = 1; $i <= min($number, $remaining); $i++) {
            $card = array_shift($this->deck);
            if ($card) {
                $hand->addCard($card);
            }
        }
        return $hand;
    }

    public function drawCard(): CardGraphic
    {
        $hand = $this->drawCards();
        return $hand->getHand()[0];
    }

    /** @return int[] */
    public function intValues(): array
    {
        $deckValues = [];
        foreach ($this->deck as $card) {
            $deckValues[] = $card->getValue();
        }
        return $deckValues;
    }

    /** @return string[] */
    public function deckValues(): array
    {
        $deckValues = [];
        foreach ($this->deck as $card) {
            $deckValues[] = $card->getStringValue();
        }
        return $deckValues;
    }

    /** @return string[] */
    public function deckTextValues(): array
    {
        $deckTextValues = [];
        foreach ($this->deck as $card) {
            $deckTextValues[] = $card->getTextValue();
        }
        return $deckTextValues;
    }

    public function remainingCards(): int
    {
        return count($this->deck);
    }
}
