<?php

namespace VendingMachine\Test;

use VendingMachine\VendingMachine;
use VendingMachine\Snacks;
use VendingMachine\CupDrink;
use VendingMachine\Drink;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/vending_machine/VendingMachine.php');

final class VendingMachineTest extends TestCase
{
    public function testDepositCoin()
    {
        $vendingMachine = new VendingMachine();
        $this->assertSame(0, $vendingMachine->depositCoin(0));
        $this->assertSame(0, $vendingMachine->depositCoin(150));
        $this->assertSame(100, $vendingMachine->depositCoin(100));
    }
    public function testPressButton()
    {
        $cider = new Drink('cider');
        $cola = new Drink('cola');
        $hotCupCoffee = new CupDrink('hot cup coffee');
        $iceCupCoffee = new CupDrink('ice cup coffee');
        $potato = new Snacks('potato');
        $vendingMachine = new VendingMachine();
        //お金が投入されていない場合は購入できない
        $this->assertSame('', $vendingMachine->pressButton($cider));
        //100円を入れた場合
        $vendingMachine->depositCoin(100);
        //商品の在庫がないと購入できない
        $this->assertSame('', $vendingMachine->pressButton($cider));
        //商品の在庫があると購入できる
        $vendingMachine->depositItem($cider, 1);
        $this->assertSame('cider', $vendingMachine->pressButton($cider));
        //100円を入れた場合はコーラを購入できない
        $vendingMachine->depositCoin(100);
        $vendingMachine->depositItem($cola, 1);
        $this->assertSame('', $vendingMachine->pressButton($cola));
        //200円を入れた場合はコーラを購入できる
        $vendingMachine->depositCoin(100);
        $this->assertSame('cola', $vendingMachine->pressButton($cola));
        //カップが投入されていない場合はコーヒーを購入できない
        $vendingMachine->depositCoin(100);
        $vendingMachine->depositItem($hotCupCoffee, 1);
        $this->assertSame('', $vendingMachine->pressButton($hotCupCoffee));
        //カップがある場合はコーヒーを購入できる
        $vendingMachine->addCup(1);
        $this->assertSame('ice cup coffee', $vendingMachine->pressButton($iceCupCoffee));
        //100円を入れた場合はポテトを購入できない
        $vendingMachine->depositCoin(100);
        $vendingMachine->depositItem($potato, 1);
        $this->assertSame('potato', $vendingMachine->pressButton($potato));
    }
    public function testAddCup()
    {
        $vendingMachine = new VendingMachine();
        $this->assertSame(99, $vendingMachine->addCup(99));
        $this->assertSame(100, $vendingMachine->addCup(1));
        $this->assertSame(100, $vendingMachine->addCup(1));
    }
    public function testDepositItem()
    {
        $vendingMachine = new VendingMachine();
        $cider = new Drink('cider');
        //サイダーの上限が50個の場合
        $this->assertSame(50, $vendingMachine->depositItem($cider, 50));
        $this->assertSame(50, $vendingMachine->depositItem($cider, 1));
    }
    public function testReceiveChange()
    {
        $vendingMachine = new VendingMachine();
        $this->assertSame(0, $vendingMachine->receiveChange());
        $vendingMachine->depositCoin(100);
        $this->assertSame(100, $vendingMachine->receiveChange());
    }
}
