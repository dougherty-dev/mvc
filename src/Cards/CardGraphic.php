<?php

namespace App\Cards;

use App\Cards;

class CardGraphic extends Card
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTextValue(): int
    {
        return $this->card;
    }
}
