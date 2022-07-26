<?php

namespace VendingMachine;

require_once(__DIR__ . '/Item.php');

class VendingMachine
{
    private const MAX_CUP_NUMBER = 100;
    private int $depositedCoin = 0;
    private int $depositedItem = 0;
    private int $cupNumber = 0;

    public function depositCoin(int $coinAmount): int
    {
        if ($coinAmount === 100) {
            $this->depositedCoin += $coinAmount;
        }
        return $this->depositedCoin;
    }
    public function depositItem(Item $item, int $num): int
    {
        $this->itemMaxNumber = $item->getMaxNumber();
        $this->depositedItem += $num;
        if ($this->depositedItem > $this->itemMaxNumber) {
            $this->depositedItem = $this->itemMaxNumber;
        }
        return $this->depositedItem;
    }
    public function pressButton(Item $item): string
    {
        $price = $item->getPrice();
        $cupNumber = $item->getCupNumber();
        if ($this->depositedCoin >= $price && $this->cupNumber >= $cupNumber && $this->depositedItem > 0) {
            $this->depositedCoin -= $price;
            $this->cupNumber -= $cupNumber;
            return $item->getName();
        } else {
            return '';
        }
    }

    public function addCup(int $num): int
    {
        $cupNumber = $this->cupNumber + $num;
        if ($cupNumber  > self::MAX_CUP_NUMBER) {
            $cupNumber = self::MAX_CUP_NUMBER;
        }
        $this->cupNumber = $cupNumber;
        return $this->cupNumber;
    }
    public function receiveChange(): int
    {
        return $this->depositedCoin;
    }
}
