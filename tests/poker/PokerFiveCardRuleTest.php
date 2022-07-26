<?php

namespace Poker\Test;

use Poker\PokerCard;
use Poker\PokerFiveCardRule;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerFiveCardRule.php');

final class PokerFiveCardRuleTest extends TestCase
{
    public function testGetHand()
    {
        $rule = new PokerFiveCardRule();
        $this->assertSame('high card', $rule->getHand([new PokerCard('H5'), new PokerCard('C7'), new PokerCard('C8'), new PokerCard('C10'), new PokerCard('CQ')]));
        $this->assertSame('straight', $rule->getHand([new PokerCard('HA'), new PokerCard('C2'), new PokerCard('C3'), new PokerCard('C4'), new PokerCard('C5')]));
        $this->assertSame('one pair', $rule->getHand([new PokerCard('H5'), new PokerCard('C5'), new PokerCard('C7'), new PokerCard('C6'), new PokerCard('C9')]));
        $this->assertSame('three cards', $rule->getHand([new PokerCard('H7'), new PokerCard('C7'), new PokerCard('C7'), new PokerCard('C4'), new PokerCard('C2')]));
        $this->assertSame('two pair', $rule->getHand([new PokerCard('H7'), new PokerCard('C7'), new PokerCard('C4'), new PokerCard('C4'), new PokerCard('C2')]));
        $this->assertSame('full house', $rule->getHand([new PokerCard('H7'), new PokerCard('C7'), new PokerCard('C4'), new PokerCard('C4'), new PokerCard('C4')]));
        $this->assertSame('four cards', $rule->getHand([new PokerCard('H7'), new PokerCard('C7'), new PokerCard('C7'), new PokerCard('C7'), new PokerCard('C2')]));
    }
}
