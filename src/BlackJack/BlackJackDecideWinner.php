<?php

namespace BlackJack;

class BlackJackDecideWinner
{
    private const HUMAN_NAME = [
        0 => 'Dealer',
        1 => 'Player',
        2 => 'Computer1',
        3 => 'Computer2',
    ];

    public function decideWinner(array $humanSumNumbers): array
    {
        $winners = [];
        $loses = [];
        $draws = [];
        if ($humanSumNumbers[0] > 21) {
            for ($i = 1; $i < count($humanSumNumbers); $i++) {
                if ($humanSumNumbers[$i] <= 21) {
                    $winners[] = self::HUMAN_NAME[$i];
                } elseif ($humanSumNumbers[$i] > 21) {
                    $draws[] = self::HUMAN_NAME[$i];
                }
            }
        }
        if ($humanSumNumbers[0] <= 21) {
            for ($i = 1; $i < count($humanSumNumbers); $i++) {
                if ($humanSumNumbers[0] < $humanSumNumbers[$i] && $humanSumNumbers[$i] <= 21) {
                    $winners[] = self::HUMAN_NAME[$i];
                }
                if ($humanSumNumbers[0] > $humanSumNumbers[$i] || $humanSumNumbers[$i] > 21) {
                    $loses[] = self::HUMAN_NAME[$i];
                }
                if ($humanSumNumbers[0] === $humanSumNumbers[$i]) {
                    $draws[] = self::HUMAN_NAME[$i];
                }
            }
        }
        return [$winners, $loses, $draws];
    }
}
