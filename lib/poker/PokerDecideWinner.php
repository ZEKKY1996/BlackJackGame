<?php

namespace Poker;

class PokerDecideWinner
{

    public function decideWinner(array $rsortPokerCards, array $handRanks): int
    {
        if ($handRanks[0] > $handRanks[1]) {
            return 1;
        } elseif ($handRanks[0] < $handRanks[1]) {
            return 2;
        }
        if ($handRanks[0] === 2) {
            if (array_keys(array_count_values($rsortPokerCards[0]), 2)[0] > array_keys(array_count_values($rsortPokerCards[1]), 2)[0]) {
                return 1;
            } elseif (array_keys(array_count_values($rsortPokerCards[0]), 2)[0] < array_keys(array_count_values($rsortPokerCards[1]), 2)[0]) {
                return 2;
            }
        }
        if ($handRanks[0] === 3) {
            for ($i = 0; $i < 2; $i++) {
                if (array_keys(array_count_values($rsortPokerCards[0]), 2)[$i] > array_keys(array_count_values($rsortPokerCards[1]), 2)[$i]) {
                    return 1;
                } elseif (array_keys(array_count_values($rsortPokerCards[0]), 2)[$i] < array_keys(array_count_values($rsortPokerCards[1]), 2)[$i]) {
                    return 2;
                }
            }
        }
        if ($handRanks[0] === 4) {
            if (max($rsortPokerCards[0]) === 13 && min($rsortPokerCards[0]) === 1 && max($rsortPokerCards[1]) !== 13) {
                return 2;
            } elseif (max($rsortPokerCards[1]) === 13 && min($rsortPokerCards[1]) === 1 && max($rsortPokerCards[0]) !== 13) {
                return 1;
            }
            for ($i = 0; $i < count($rsortPokerCards[0]); $i++) {
                if ($rsortPokerCards[0][$i] > $rsortPokerCards[1][$i]) {
                    return 1;
                } elseif ($rsortPokerCards[0][$i] < $rsortPokerCards[1][$i]) {
                    return 2;
                }
            }
        }
        if ($handRanks[0] === 5) {
            if (array_keys(array_count_values($rsortPokerCards[0]), 3)[0] > array_keys(array_count_values($rsortPokerCards[1]), 3)[0]) {
                return 1;
            } elseif (array_keys(array_count_values($rsortPokerCards[0]), 3)[0] < array_keys(array_count_values($rsortPokerCards[1]), 3)[0]) {
                return 2;
            }
        }
        if ($handRanks[0] === 7) {
            if (array_keys(array_count_values($rsortPokerCards[0]), 4)[0] > array_keys(array_count_values($rsortPokerCards[1]), 4)[0]) {
                return 1;
            } elseif (array_keys(array_count_values($rsortPokerCards[0]), 4)[0] < array_keys(array_count_values($rsortPokerCards[1]), 4)[0]) {
                return 2;
            }
        }
        for ($i = 0; $i < count($rsortPokerCards[0]); $i++) {
            if ($rsortPokerCards[0][$i] > $rsortPokerCards[1][$i]) {
                return 1;
            } elseif ($rsortPokerCards[0][$i] < $rsortPokerCards[1][$i]) {
                return 2;
            }
        }
        return 3;
    }
}
