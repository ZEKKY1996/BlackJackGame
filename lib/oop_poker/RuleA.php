<?php

namespace OopPoker;

require_once('Rule.php');

class RuleA implements Rule
{
    public function getHand(array $cards)
    {
        return 'pair';
    }
}
