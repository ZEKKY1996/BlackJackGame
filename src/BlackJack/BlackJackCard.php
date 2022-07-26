<?php

namespace BlackJack;

class BlackJackCard
{

    public const CARD_RANK = [
        'A' => 11,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        'J' => 10,
        'Q' => 10,
        'K' => 10,
    ];
    public function __construct(public string $suitNumber)
    {
    }
    public function getRank(): int
    {
        return self::CARD_RANK[substr($this->suitNumber, 1, strlen($this->suitNumber) - 1)];
    }
}
