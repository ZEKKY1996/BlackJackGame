<?php

namespace Poker;

require_once('PokerRule.php');
require_once('PokerCard.php');

class PokerFiveCardRule implements PokerRule
{
    private const HIGH_CARD = 'high card';
    private const ONE_PAIR = 'one pair';
    private const TWO_PAIR = 'two pair';
    private const STRAIGHT = 'straight';
    private const THREE_CARDS = 'three cards';
    private const FULL_HOUSE = 'full house';
    private const FOUR_CARDS = 'four cards';

    public function getHand(array $pokerCards): string
    {
        $cardRanks = array_map(fn ($pokerCard) => $pokerCard->getRank(), $pokerCards);
        $name = self::HIGH_CARD;

        if ($this->isFourCards($cardRanks)) {
            $name = self::FOUR_CARDS;
        } elseif ($this->isFullHouse($cardRanks)) {
            $name = self::FULL_HOUSE;
        } elseif ($this->isStraight($cardRanks)) {
            $name = self::STRAIGHT;
        } elseif ($this->isThreeCards($cardRanks)) {
            $name = self::THREE_CARDS;
        } elseif ($this->isTwoPair($cardRanks)) {
            $name = self::TWO_PAIR;
        } elseif ($this->isOnePair($cardRanks)) {
            $name = self::ONE_PAIR;
        }
        return $name;
    }
    private function isFourCards(array $cardRanks): bool
    {
        $number = [];
        foreach (array_count_values($cardRanks) as  $overlap) {
            $number[] = $overlap;
        }
        rsort($number);
        return $number[0] === 4;
    }
    private function isFullHouse(array $cardRanks): bool
    {
        $number = [];
        foreach (array_count_values($cardRanks) as  $overlap) {
            $number[] = $overlap;
        }
        rsort($number);
        return $number[0] === 3 && $number[1] === 2;
    }
    private function isThreeCards(array $cardRanks): bool
    {
        $number = [];
        foreach (array_count_values($cardRanks) as  $overlap) {
            $number[] = $overlap;
        }
        rsort($number);
        return $number[0] === 3 && $number[1] === 1;
    }
    private function isStraight(array $cardRanks): bool
    {
        sort($cardRanks);
        return range($cardRanks[0], $cardRanks[0] + count($cardRanks) - 1) === $cardRanks || $this->isMinMax($cardRanks);
    }
    private function isMinMax(array $cardRanks): bool
    {
        return $cardRanks === [min(PokerCard::CARD_RANK), min(PokerCard::CARD_RANK) + 1, min(PokerCard::CARD_RANK) + 2, min(PokerCard::CARD_RANK) + 3, max(PokerCard::CARD_RANK)];
    }
    private function isTwoPair(array $cardRanks): bool
    {
        $number = [];
        foreach (array_count_values($cardRanks) as  $overlap) {
            $number[] = $overlap;
        }
        rsort($number);
        return $number[0] === 2 && $number[1] === 2;
    }
    private function isOnePair(array $cardRanks): bool
    {
        return count(array_unique($cardRanks)) === 4;
    }
}
