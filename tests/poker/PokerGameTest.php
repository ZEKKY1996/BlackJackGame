<?php

namespace Poker\Test;

use Poker\PokerGame;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerGame.php');

final class PokerGameTest extends TestCase
{
    public function testStart()
    {
        //カードが2枚の時
        $game1 = new PokerGame(['CA', 'DA'], ['C9', 'H10']);
        $this->assertSame(['pair', 'straight', 2], $game1->start());
        //カードが3枚の時
        $game2 = new PokerGame(['C2', 'D2', 'S2'], ['C10', 'H9', 'DJ']);
        $this->assertSame(['three cards', 'straight', 1], $game2->start());
        //カードが5枚の時
        $game3 = new PokerGame(['C2', 'D2', 'S2', 'H2', 'C3'], ['C10', 'H9', 'DK', 'DQ', 'SJ']);
        $this->assertSame(['four cards', 'straight', 1], $game3->start());
    }
}
