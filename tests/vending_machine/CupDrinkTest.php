<?php

namespace VendingMachine\Test;

use VendingMachine\CupDrink;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/vending_machine/CupDrink.php');

final class CupDrinkTest extends TestCase
{
    public function testGetPrice()
    {
        $drink = new CupDrink('ice cup coffee');
        $this->assertSame(100, $drink->getPrice());
    }
    public function testGetName()
    {
        $drink = new CupDrink('ice cup coffee');
        $this->assertSame('ice cup coffee', $drink->getName());
    }
    public function TestGetCupNumber()
    {
        $drink = new CupDrink('ice cup coffee');
        $this->assertSame(1, $drink->getCupNumber());
    }
    public function TestGetMaxNumber()
    {
        $drink = new CupDrink('hot cup coffee');
        $this->assertSame(100, $drink->getMaxNumber());
        $drink = new CupDrink('ice cup coffee');
        $this->assertSame(100, $drink->getMaxNumber());
    }
}
