<?php

namespace BlackJack\Test;

use BlackJack\BlackJackGame;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../src/BlackJack/BlackJackGame.php');

final class BlackJackGameTest extends TestCase
{
    public function testStart()
    {
        $game1 = new BlackJackGame(['H3', 'D4'], ['C10', 'DK']);
        $this->assertSame([17, 30, 'Dealer'], $game1->start());
        $game1 = new BlackJackGame(['H7', 'D5'], ['C2', 'DK']);
        $this->assertSame([22, 22, 'Draw'], $game1->start());
        $game1 = new BlackJackGame(['H5', 'DJ'], ['CA', 'DK']);
        $this->assertSame([25, 21, 'Player'], $game1->start());
    }
}
