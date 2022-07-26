<?php

const DIGIT = 4;

function judge(int $answer, int $input): array
{
    $array_answer = str_split($answer, 1);
    $array_input = str_split($input, 1);
    $hit = 0;
    for ($i = 0; $i < DIGIT; $i++) {
        if ($array_answer[$i] === $array_input[$i]) {
            $hit++;
        }
    }
    $blow = count(array_intersect($array_answer, $array_input)) - $hit;

    return [$hit, $blow];
}

judge(5678, 5678);
