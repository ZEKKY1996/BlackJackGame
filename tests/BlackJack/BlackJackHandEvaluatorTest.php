<?php

namespace BlackJack\Test;

use BlackJack\BlackJackHandEvaluator;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../src/BlackJack/BlackJackHandEvaluator.php');

final class BlackJackHandEvaluatorTest extends TestCase
{
    public function testStart()
    {
        $cardRanks = new BlackJackHandEvaluator();
        $this->assertSame(17, $cardRanks->getSumNumber([8, 9]));
    }
}
