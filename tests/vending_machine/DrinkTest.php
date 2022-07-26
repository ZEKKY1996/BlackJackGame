<?php

namespace VendingMachine\Test;

use VendingMachine\Drink;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/vending_machine/Drink.php');

final class DrinkTest extends TestCase
{
    public function testGetPrice()
    {
        $drink = new Drink('cola');
        $this->assertSame(150, $drink->getPrice());
    }
    public function testGetName()
    {
        $drink = new Drink('cola');
        $this->assertSame('cola', $drink->getName());
    }
    public function TestGetCupNumber()
    {
        $drink = new Drink('cola');
        $this->assertSame(0, $drink->getCupNumber());
    }
    public function TestGetMaxNumber()
    {
        $drink = new Drink('cider');
        $this->assertSame(50, $drink->getMaxNumber());
        $drink = new Drink('cola');
        $this->assertSame(60, $drink->getMaxNumber());
    }
}
