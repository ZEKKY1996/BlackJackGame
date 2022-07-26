<?php

const HIGH_CARD = 'high card';
const PAIR = 'pair';
const STRAIGHT = 'straight';
const THREE_CARD = 'three card';
const CARDS = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
const HAND_RANK = [
    HIGH_CARD => 1,
    PAIR => 2,
    STRAIGHT => 3,
    THREE_CARD => 4,
];

define('CARD_RANK', (function () {
    $cardRanks = [];
    foreach (CARDS as $index => $card) {
        $cardRanks[$card] = $index;
    }
    return $cardRanks;
})());

function show(string $card11, string $card12, string $card13, string $card21, string $card22, string $card23): array
{
    $cardRanks = convertToCardRanks([$card11, $card12, $card13, $card21, $card22, $card23]);
    $playerCardRanks = array_chunk($cardRanks, 3);
    $hands = array_map(fn ($playerCardRank) => checkHand($playerCardRank[0], $playerCardRank[1], $playerCardRank[2]), $playerCardRanks);
    $winner = checkWinner($hands[0], $hands[1]);
    return [$hands[0]['name'], $hands[1]['name'], $winner];
}

function convertToCardRanks(array $cards): array
{
    return array_map(fn ($card) => CARD_RANK[substr($card, 1, strlen($card) - 1)], $cards);
}

function checkHand(int $cardRank1, int $cardRank2, int $cardRank3): array
{
    $sort = [$cardRank1, $cardRank2, $cardRank3];
    rsort($sort);
    $primary = $sort[0];
    $secondary = $sort[1];
    $minimum = $sort[2];
    $name = HIGH_CARD;
    if (isStraight($cardRank1, $cardRank2, $cardRank3)) {
        $name = STRAIGHT;
        if (isMinMax($cardRank1, $cardRank2, $cardRank3)) {
            if ($sort[1] === 1) {
                $primary = 1;
            }
            if ($sort[1] === 11) {
                $primary = 0;
            }
        }
    }
    if (isPair($cardRank1, $cardRank2, $cardRank3)) {
        $name = PAIR;
    }
    if (isThreeCard($cardRank1, $cardRank2, $cardRank3)) {
        $name = THREE_CARD;
    }
    return [
        'name' => $name,
        'rank' => HAND_RANK[$name],
        'primary' => $primary,
        'secondary' => $secondary,
        'minimum' => $minimum,
    ];
}

function isThreeCard(int $cardRank1, int $cardRank2, int $cardRank3): bool
{
    $unique = [$cardRank1, $cardRank2, $cardRank3];
    return count(array_unique($unique)) === 1;
}

function isStraight(int $cardRank1, int $cardRank2, int $cardRank3): bool
{
    $sort = [$cardRank1, $cardRank2, $cardRank3];
    rsort($sort);
    return ($sort[0] - $sort[1]) === 1 && ($sort[1] - $sort[2]) === 1 || isMinMax($cardRank1, $cardRank2, $cardRank3);
}

function isMinMax(int $cardRank1, int $cardRank2, int $cardRank3): bool
{
    $sort = [$cardRank1, $cardRank2, $cardRank3];
    rsort($sort);
    return $sort[2] === 0 && $sort[0] === 12 && $sort[1] === 1;
}

function isPair(int $cardRank1, int $cardRank2, int $cardRank3): bool
{
    return $cardRank1 === $cardRank2 || $cardRank2 === $cardRank3 || $cardRank1 === $cardRank3;
}

function checkWinner(array $hand1, array $hand2): int
{
    foreach (['rank', 'primary', 'secondary', 'minimum'] as $k) {
        if ($hand1[$k] > $hand2[$k]) {
            return 1;
        }
        if ($hand1[$k] < $hand2[$k]) {
            return 2;
        }
    }

    return 0;
}
