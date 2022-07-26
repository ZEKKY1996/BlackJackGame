<?php

namespace BlackJack;

class BlackJackHuman
{
    public const RANDOM_SUIT = [
        1 => 'S',
        2 => 'D',
        3 => 'C',
        4 => 'H',
    ];
    public const RANDOM_NUMBER = [
        1 => 'A',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => 'J',
        12 => 'Q',
        13 => 'K',
    ];
    public const SUIT_NAME = [
        'S' => 'スペード',
        'D' => 'ダイヤ',
        'C' => 'クラブ',
        'H' => 'ハート',
    ];
    public const HUMAN_NAME = [
        'Player' => 'あなた',
        'Computer1' => 'COM 1',
        'Computer2' => 'COM 2',
    ];

    public function setCard(): string
    {
        $newCard = self::RANDOM_SUIT[random_int(1, 4)] . self::RANDOM_NUMBER[random_int(1, 13)];
        return $newCard;
    }
    public function checkCard(string $addCard): string
    {
        return self::SUIT_NAME[substr($addCard, 0, 1)] . 'の' . substr($addCard, 1, strlen($addCard) - 1);
    }
    public function checkHuman(string $results): string
    {
        return self::HUMAN_NAME[$results];
    }
    public function aceCheck(array $humanCardRanks): array
    {
        $handEvaluator = new BlackJackHandEvaluator();
        $humanSumNumber = $handEvaluator->getSumNumber($humanCardRanks);

        if ($humanSumNumber > 21 && in_array(11, $humanCardRanks)) {
            $humanCardRanks = array_replace($humanCardRanks, [array_search(11, $humanCardRanks) => 1]);
            $humanSumNumber = $handEvaluator->getSumNumber($humanCardRanks);
        }
        return [$humanCardRanks, $humanSumNumber];
    }
}
