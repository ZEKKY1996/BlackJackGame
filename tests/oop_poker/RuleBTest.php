<?php

namespace OopPoker\Tests;

require_once(__DIR__ . '/../../lib/oop_poker/RuleB.php');

use OopPoker\RuleB;
use OopPoker\Card;
use PHPUnit\Framework\TestCase;


final class RuleBTest extends TestCase
{
    public function testGetHand()
    {
        $rule = new RuleB();
        $cards = [new Card('H', 10), new Card('C', 10)];
        $this->assertSame('high card', $rule->getHand($cards));
    }
}
