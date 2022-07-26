<?php

namespace BlackJack\Test;

use BlackJack\BlackJackDecideWinner;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../src/BlackJack/BlackJackDecideWinner.php');

final class BlackJackDecideWinnerTest extends TestCase
{
    public function testStart()
    {
        $sumNumber = new BlackJackDecideWinner();
        $this->assertSame('Dealer', $sumNumber->decideWinner([18, 22]));
        $this->assertSame('Draw', $sumNumber->decideWinner([19, 19]));
        $this->assertSame('Player', $sumNumber->decideWinner([23, 19]));
    }
}
