<?php

namespace OopPoker\Tests;

require_once(__DIR__ . '/../../lib/oop_poker/HandEvaluator.php');
require_once(__DIR__ . '/../../lib/oop_poker/RuleA.php');
require_once(__DIR__ . '/../../lib/oop_poker/Card.php');

use OopPoker\HandEvaluator;
use OopPoker\RuleA;
use OopPoker\Card;
use PHPUnit\Framework\TestCase;


final class HandEvaluatorTest extends TestCase
{
    public function testGetHand()
    {
        $handEvaluator = new HandEvaluator(new RuleA());
        $cards = [new Card('H', 10), new Card('C', 19)];
        $this->assertSame('pair', $handEvaluator->getHand($cards));
    }
    public function testGetWinner()
    {
        $this->assertSame(1, HandEvaluator::getWinner('pair', 'high card'));
    }
}
