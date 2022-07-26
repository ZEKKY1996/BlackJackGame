<?php

namespace Poker;

class PokerHandRank
{
    public const HAND_RANK = [
        'high card' => 1,
        'pair' => 2,
        'two pair' => 3,
        'straight' => 4,
        'three cards' => 5,
        'full house' => 6,
        'four cards' => 7,
    ];

    public function getHandRank(array $hands): array
    {
        $handRanks = [];
        foreach ($hands as $hand) {
            $handRanks[] = self::HAND_RANK[$hand];
        }
        return $handRanks;
    }
}
