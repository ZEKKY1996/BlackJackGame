<?php

const TAX = 10;

const PRICES = [
    1 => ['price' => 100, 'type' => ''], //玉ねぎ
    2 => ['price' => 150, 'type' => ''], //人参
    3 => ['price' => 200, 'type' => ''], //りんご
    4 => ['price' => 350, 'type' => ''], //ぶどう
    5 => ['price' => 180, 'type' => 'drink'], //牛乳
    6 => ['price' => 220, 'type' => ''], //卵
    7 => ['price' => 440, 'type' => 'bento'], //唐揚げ弁当
    8 => ['price' => 380, 'type' => 'bento'], //のり弁当
    9 => ['price' => 80, 'type' => 'drink'], //お茶
    10 => ['price' => 100, 'type' => 'drink'], //コーヒー
];

$time = '21:00';
$items = [1, 1, 1, 3, 5, 7, 8, 9, 10];

function calc(string $time, array $items): int
{
    $priceAmount = 0;
    $bentoAmount = 0;
    $drink = 0;
    $bento = 0;
    foreach ($items as $item) {
        $priceAmount += PRICES[$item]['price'];
        if (PRICES[$item]['type'] === 'drink') {
            $drink++;
        }
        if (PRICES[$item]['type'] === 'bento') {
            $bento++;
            $bentoAmount += PRICES[$item]['price'];
        }
    }

    $priceAmount -= discountOnion(array_count_values($items)[1]);
    $priceAmount -= discountSet($drink, $bento);
    $priceAmount -= discountBento($time, $bentoAmount);

    return (int)$priceAmount * (100 + TAX) / 100;
}

function discountOnion(int $onionNumber): int
{
    if ($onionNumber >= 5) {
        return floor($onionNumber / 5) * 100;
    } elseif ($onionNumber % 5 >= 3) {
        return 50;
    }
}

function discountSet(int $drinkNumber, int $bentoNumber): int
{
    return min($drinkNumber, $bentoNumber) * 20;
}

function discountBento(string $time, int $bentoAmount): int
{
    if (strtotime('20:00') > strtotime($time)) {
        return 0;
    } else {
        return (int)$bentoAmount / 2;
    }
}

calc($time, $items);
