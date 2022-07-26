<?php

//入力された値を受け取る
const SPLIT_LENGTH = 2;
function getInput(array $argv): array
{
    $argument = array_slice($argv, 1);
    return array_chunk($argument, SPLIT_LENGTH);
}
//入力された値を扱いやすい形にする
function groupChannelViewingPeriods(array $inputs): array
{
    $chViewPeriod = [];
    foreach ($inputs as $input) {
        $chan = $input[0];
        $min = $input[1];
        $mins = [$min];
        if (array_key_exists($chan, $chViewPeriod)) {
            $mins = array_merge($chViewPeriod[$chan], $mins);
        }
        $chViewPeriod[$chan] = $mins;
    }
    return $chViewPeriod;
}
function calculateTotalHour(array $chViewPeriod): float
{
    $viewingTimes = [];
    foreach ($chViewPeriod as $period) {
        $viewingTimes = array_merge($viewingTimes, $period);
    }
    $totalMin = array_sum($viewingTimes);
    return round($totalMin / 60, 1);
}
function display(array $chViewPeriod): void
{
    $totalHour = calculateTotalHour($chViewPeriod);
    echo $totalHour . PHP_EOL;
    foreach ($chViewPeriod as $chan => $mins) {
        echo $chan . ' ' . array_sum($mins) . ' ' . count($mins) . PHP_EOL;
    }
}

$inputs = getInput($_SERVER['argv']);
$chViewPeriod = groupChannelViewingPeriods($inputs);
display($chViewPeriod);
