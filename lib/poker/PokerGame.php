<?php

namespace Poker;

require_once('PokerCard.php');
require_once('PokerHandEvaluator.php');
require_once('PokerTwoCardRule.php');
require_once('PokerThreeCardRule.php');
require_once('PokerFiveCardRule.php');
require_once('PokerHandRank.php');
require_once('PokerDecideWinner.php');

class PokerGame
{
    public function __construct(private array $cards1, private array $cards2)
    {
    }
    public function start(): array
    {
        $hands = [];
        $handRanks = [];
        $rsortPokerCards = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = array_map(fn ($card) => new PokerCard($card), $cards);
            $rule = $this->getRule($cards);
            $handEvaluator = new PokerHandEvaluator($rule);
            $hands[] = $handEvaluator->getHand($pokerCards);
            $rsortPokerCards[] = rsort($pokerCards);
        }
        $handRank = new PokerHandRank();
        $handRanks = $handRank->getHandRank($hands);
        $decideWinner = new PokerDecideWinner();
        $winner = $decideWinner->decideWinner($rsortPokerCards, $handRanks);
        return [$hands[0], $hands[1], $winner];
    }
    private function getRule(array $cards): PokerRule
    {
        if (count($cards) === 2) {
            return new PokerTwoCardRule();
        }
        if (count($cards) === 3) {
            return new PokerThreeCardRule();
        }
        if (count($cards) === 5) {
            return new PokerFiveCardRule();
        }
    }
}
