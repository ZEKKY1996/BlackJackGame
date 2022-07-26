<?php

namespace BlackJack\Test;

use BlackJack\BlackJackCard;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../src/BlackJack/BlackJackCard.php');

final class BlackJackCardTest extends TestCase
{
    public function testStart()
    {
        $cardRank = new BlackJackCard('HK');
        $this->assertSame(10, $cardRank->getRank());
    }
}
