<?php

namespace VendingMachine;

require_once(__DIR__ . '/Item.php');

class CupDrink extends Item
{
    private const PRICES = [
        'ice cup coffee' => 100,
        'hot cup coffee' => 100,
    ];
    private const MAX_NUMBER = [
        'ice cup coffee' => 100,
        'hot cup coffee' => 100,
    ];

    public function __construct(string $name)
    {
        parent::__construct($name);
    }
    public function getPrice(): int
    {
        return self::PRICES[$this->name];
    }
    public function getCupNumber(): int
    {
        return 1;
    }
    public function getMaxNumber(): int
    {
        return self::MAX_NUMBER[$this->name];
    }
}
