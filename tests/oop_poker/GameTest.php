<?php

namespace OopPoker\Tests;

require_once(__DIR__ . '/../../lib/oop_poker/Game.php');

use OopPoker\Game;

use PHPUnit\Framework\TestCase;


final class GameTest extends TestCase
{
    public function testStart()
    {
        $game = new Game('田中', '松本', 2, 'A');
        $result = $game->start();
        $this->assertSame(1, $result);
    }
}
