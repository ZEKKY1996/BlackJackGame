<?php

namespace Poker\Test;

use Poker\PokerCard;
use Poker\PokerTwoCardRule;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerTwoCardRule.php');

final class PokerTwoCardRuleTest extends TestCase
{
    public function testGetHand()
    {
        $rule = new PokerTwoCardRule();
        $this->assertSame('high card', $rule->getHand([new PokerCard('H5'), new PokerCard('C7')]));
        $this->assertSame('straight', $rule->getHand([new PokerCard('HA'), new PokerCard('C2')]));
        $this->assertSame('pair', $rule->getHand([new PokerCard('H5'), new PokerCard('C5')]));
        $this->assertSame('straight', $rule->getHand([new PokerCard('H6'), new PokerCard('C7')]));
    }
}
