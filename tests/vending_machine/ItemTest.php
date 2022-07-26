<?php

namespace VendingMachine\Test;

use VendingMachine\CupDrink;
use VendingMachine\Drink;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/vending_machine/Item.php');

final class ItemTest extends TestCase
{
    public function testGetPrice()
    {
        $item = new Drink('cola');
        $this->assertSame(150, $item->getPrice());
        $item = new CupDrink('hot cup coffee');
        $this->assertSame(100, $item->getPrice());
        $item = new CupDrink('ice cup coffee');
        $this->assertSame(100, $item->getPrice());
    }
    public function TestGetName()
    {
        $item = new Drink('cola');
        $this->assertSame('cola', $item->getPrice());
        $item = new CupDrink('hot cup coffee');
        $this->assertSame('hot cup coffee', $item->getPrice());
        $item = new CupDrink('ice cup coffee');
        $this->assertSame('ice cup coffee', $item->getPrice());
    }
}
