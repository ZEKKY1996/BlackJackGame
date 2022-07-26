<?php

namespace Poker;

require_once('PokerCard.php');
require_once('PokerRule.php');

class PokerHandEvaluator
{
    public function __construct(private PokerRule $rule)
    {
    }
    public function getHand(array $pokerCards): string
    {
        return $this->rule->getHand($pokerCards);
    }
}
