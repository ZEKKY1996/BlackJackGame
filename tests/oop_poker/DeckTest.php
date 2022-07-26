<?php

namespace OopPoker\Tests;

require_once(__DIR__ . '/../../lib/oop_poker/Deck.php');

use OopPoker\Deck;

use PHPUnit\Framework\TestCase;


final class DeckTest extends TestCase
{
    public function testDrawCards()
    {
        $deck = new Deck();
        $cards = $deck->drawCards(2);
        $this->assertSame(2, count($cards));
    }
}
