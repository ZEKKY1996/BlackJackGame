<?php

namespace BlackJack\Test;

use BlackJack\BlackJackPlayer;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../src/BlackJack/BlackJackPlayer.php');

final class BlackJackPlayerTest extends TestCase
{
    public function testStart()
    {
        $addCards = new BlackJackPlayer();
        // $this->assertSame(['H10'], $addCards->addPlayerCard([15]));
        $this->assertSame(['H10', 'H10'], $addCards->addPlayerCard(5));
    }
}
