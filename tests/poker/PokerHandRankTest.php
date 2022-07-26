<?php

namespace Poker\Test;

use Poker\PokerHandRank;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerHandRank.php');

final class PokerHandRankTest extends TestCase
{
    public function testGetHandRank()
    {
        $handRank = new PokerHandRank();
        $this->assertSame([2, 4], $handRank->getHandRank(['pair', 'straight']));
    }
}
