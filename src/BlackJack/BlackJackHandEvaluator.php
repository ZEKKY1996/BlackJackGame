<?php

namespace BlackJack;

class BlackJackHandEvaluator
{

    public function getSumNumber(array $cardRanks): int
    {
        return array_sum($cardRanks);
    }
}
