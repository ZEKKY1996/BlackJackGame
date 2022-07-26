<?php

namespace Poker\Test;

use Poker\PokerHandEvaluator;
use Poker\PokerThreeCardRule;
use Poker\PokerTwoCardRule;
use Poker\PokerCard;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerHandEvaluator.php');

final class PokerHandEvaluatorTest extends TestCase
{
    public function testGetHand()
    {
        $handEvaluator = new PokerHandEvaluator(new PokerTwoCardRule());
        $this->assertSame('high card', $handEvaluator->getHand([new PokerCard('H5'), new PokerCard('C7')]));
        $this->assertSame('straight', $handEvaluator->getHand([new PokerCard('HA'), new PokerCard('C2')]));
        $this->assertSame('pair', $handEvaluator->getHand([new PokerCard('H5'), new PokerCard('C5')]));
        $this->assertSame('straight', $handEvaluator->getHand([new PokerCard('H6'), new PokerCard('C7')]));
        $handEvaluator = new PokerHandEvaluator(new PokerThreeCardRule());
        $this->assertSame('high card', $handEvaluator->getHand([new PokerCard('H5'), new PokerCard('C7'), new PokerCard('C8')]));
        $this->assertSame('straight', $handEvaluator->getHand([new PokerCard('HA'), new PokerCard('C2'), new PokerCard('C3')]));
        $this->assertSame('pair', $handEvaluator->getHand([new PokerCard('H5'), new PokerCard('C5'), new PokerCard('C7')]));
        $this->assertSame('three cards', $handEvaluator->getHand([new PokerCard('H7'), new PokerCard('C7'), new PokerCard('C7')]));
    }
}
