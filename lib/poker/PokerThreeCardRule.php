<?php

namespace Poker;

require_once('PokerRule.php');
require_once('PokerCard.php');

class PokerThreeCardRule implements PokerRule
{
    private const HIGH_CARD = 'high card';
    private const PAIR = 'pair';
    private const STRAIGHT = 'straight';
    private const THREE_CARDS = 'three cards';

    public function getHand(array $pokerCards): string
    {
        $cardRanks = array_map(fn ($pokerCard) => $pokerCard->getRank(), $pokerCards);
        $name = self::HIGH_CARD;

        if ($this->isStraight($cardRanks)) {
            $name = self::STRAIGHT;
        } elseif ($this->isThreeCards($cardRanks)) {
            $name = self::THREE_CARDS;
        } elseif ($this->isPair($cardRanks)) {
            $name = self::PAIR;
        }
        return $name;
    }
    private function isThreeCards(array $cardRanks): bool
    {
        return count(array_unique($cardRanks)) === 1;
    }
    private function isStraight(array $cardRanks): bool
    {
        sort($cardRanks);
        return range($cardRanks[0], $cardRanks[0] + count($cardRanks) - 1) === $cardRanks || $this->isMinMax($cardRanks);
    }
    private function isMinMax(array $cardRanks): bool
    {
        return $cardRanks === [min(PokerCard::CARD_RANK), min(PokerCard::CARD_RANK) + 1, max(PokerCard::CARD_RANK)];
    }
    private function isPair(array $cardRanks): bool
    {
        return count(array_unique($cardRanks)) === 2;
    }
}
