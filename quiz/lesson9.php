<?php

const VALUE = ['dummy', 100, 120, 150, 250, 80, 120, 100, 180, 50, 300];
const TAX = 0.1;
const SPLIT_LENGTH = 2;

function getInput(): array
{
    $inputs = array_slice($_SERVER['argv'], 1);
    return array_chunk($inputs, SPLIT_LENGTH);
}
function calculationBreadVolume($inputs)
{
    $breadProfit = [];
    foreach ($inputs as $input) {
        $bread = $input[0];
        $volume = $input[1];
        $volumes = [$volume];
        if (array_key_exists($bread, $breadProfit)) {
            $volumes = array_merge($breadProfit[$bread], $volumes);
        }
        $breadProfit[$bread] = $volumes;
    }
    return $breadProfit;
}
function calculationProfitSum($breadProfit)
{
    $profitSum = [];
    foreach ($breadProfit as $profit) {
        $profitSum[] = $profit[1] * VALUE[$profit[0]] * (1 + TAX);
    }
    return array_sum($profitSum);
}
function calculationBreadCount($inputs)
{
    $breadCount = [];
    foreach ($inputs as $input) {
        $bread = $input[0];
        $count = $input[1];
        $counts = [$count];
        if (array_key_exists($bread, $breadCount)) {
            $counts = array_merge($breadCount[$bread], $counts);
        }
        $breadCount[$bread] = $counts;
    }
    return $breadCount;
}
function calculationMaxMinCount($breadCount)
{
    foreach ($breadCount as $bread => $count) {
        $arr[$bread] = array_sum($count);
    }
    return $arr;
}
$inputs = getInput();
$breadProfit = calculationBreadVolume($inputs);
$profitSum = calculationProfitSum($inputs);
$breadCount = calculationBreadCount($inputs);
$maxMinVolume = calculationMaxMinCount($breadCount);

echo $profitSum . PHP_EOL;
while ($maxMin = current($maxMinVolume)) {
    if ($maxMin == max($maxMinVolume)) {
        echo key($maxMinVolume) . PHP_EOL;
    } elseif ($maxMin == min($maxMinVolume)) {
        echo key($maxMinVolume) . ' ';
    }
    next($maxMinVolume);
}
echo PHP_EOL;
