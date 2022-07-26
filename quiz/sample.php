<?php

$results = [3 => [
    0 => [0 => 'player', 1 => 'Computer2'],
    1 => [],
    2 => [0 => 'Computer1'],
]];

var_dump($results);
var_dump((empty($results[3][0])));
var_dump((empty($results[3][1])));
var_dump((empty($results[3][2])));
