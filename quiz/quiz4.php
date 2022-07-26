<?php

$ages = [
    'Nakata' => 34,
    'Abe' => 25,
    'Kato' => 32,
    'Watanabe' => 29,
    'Fukuzawa' => 42,
];

ksort($ages, SORT_STRING);
var_dump($ages);
