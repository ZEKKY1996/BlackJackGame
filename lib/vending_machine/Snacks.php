<?php

namespace VendingMachine;

require_once(__DIR__ . '/Item.php');

class Snacks extends Item
{
    private const PRICES = [
        'potato' => 150,
    ];
    private const MAX_NUMBER = [
        'potato' => 20,
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
        return 0;
    }
    public function getMaxNumber(): int
    {
        return self::MAX_NUMBER[$this->name];
    }
}
