<?php

namespace OopPoker\Tests;

require_once(__DIR__ . '/../../lib/oop_poker/RuleA.php');

use OopPoker\RuleA;
use OopPoker\Card;
use PHPUnit\Framework\TestCase;


final class RuleATest extends TestCase
{
    public function testGetHand()
    {
        $rule = new RuleA();
        $cards = [new Card('H', 10), new Card('C', 10)];
        $this->assertSame('pair', $rule->getHand($cards));
    }
}
