<?php

namespace VendingMachine\Test;

use VendingMachine\Snacks;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/vending_machine/Snacks.php');

final class SnacksTest extends TestCase
{
    public function testGetPrice()
    {
        $snacks = new Snacks('potato');
        $this->assertSame(150, $snacks->getPrice());
    }
    public function testGetName()
    {
        $snacks = new Snacks('potato');
        $this->assertSame('potato', $snacks->getName());
    }
    public function TestGetCupNumber()
    {
        $snacks = new Snacks('potato');
        $this->assertSame(0, $snacks->getCupNumber());
    }
    public function TestGetMaxNumber()
    {
        $snacks = new Snacks('potato');
        $this->assertSame(20, $snacks->getMaxNumber());
    }
}
