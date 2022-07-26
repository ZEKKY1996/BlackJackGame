<?php

namespace Poker\Test;

use Poker\PokerDecideWinner;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerDecideWinner.php');

final class PokerDecideWinnerTest extends TestCase
{
    public function testGetHandRank()
    {
        $winner = new PokerDecideWinner();
        $this->assertSame(2, $winner->decideWinner([[12, 10, 9], [11, 10, 9]], [1, 4]));
        $this->assertSame(2, $winner->decideWinner([[12, 10, 9, 9, 9], [11, 10, 10, 10, 4]], [5, 5]));
        $this->assertSame(2, $winner->decideWinner([[12, 7, 7, 3, 3], [11, 10, 10, 4, 4]], [3, 3]));
        $this->assertSame(1, $winner->decideWinner([[7, 6, 5, 4, 3], [13, 4, 3, 2, 1]], [4, 4]));
        $this->assertSame(3, $winner->decideWinner([[13, 4, 3, 2, 1], [13, 4, 3, 2, 1]], [4, 4]));
        $this->assertSame(1, $winner->decideWinner([[13, 13, 2, 2, 2], [12, 12, 3, 3, 3]], [6, 6]));
        $this->assertSame(2, $winner->decideWinner([[13, 2, 2, 2, 2], [12, 10, 10, 10, 10]], [7, 7]));
    }
}
