<?php

namespace Poker\Test;

use Poker\PokerCard;
use Poker\PokerThreeCardRule;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerThreeCardRule.php');

final class PokerThreeCardRuleTest extends TestCase
{
    public function testGetHand()
    {
        $rule = new PokerThreeCardRule();
        $this->assertSame('high card', $rule->getHand([new PokerCard('H5'), new PokerCard('C7'), new PokerCard('C8')]));
        $this->assertSame('straight', $rule->getHand([new PokerCard('HA'), new PokerCard('C2'), new PokerCard('C3')]));
        $this->assertSame('pair', $rule->getHand([new PokerCard('H5'), new PokerCard('C5'), new PokerCard('C7')]));
        $this->assertSame('three cards', $rule->getHand([new PokerCard('H7'), new PokerCard('C7'), new PokerCard('C7')]));
    }
}
