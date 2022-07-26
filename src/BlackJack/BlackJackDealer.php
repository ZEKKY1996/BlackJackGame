<?php

namespace BlackJack;

require_once('BlackJackCard.php');
require_once('BlackJackHuman.php');

class BlackJackDealer extends BlackJackHuman
{
    public function addDealerCard(array $dealerCardRanks): array
    {
        $addCards = [];

        $dealerCardRanks = $this->aceCheck($dealerCardRanks)[0];
        $dealerSumNumber = $this->aceCheck($dealerCardRanks)[1];

        echo 'ディーラーの現在の得点は' . $dealerSumNumber . 'です。' . PHP_EOL;
        while ($dealerSumNumber < 17) {
            $addCard = $this->setCard();
            array_push($addCards, $addCard);
            $checkCard = $this->checkCard($addCard);
            echo 'ディーラーの引いたカードは' . $checkCard . 'です。' . PHP_EOL;
            $getRank = new BlackJackCard($addCard);
            $addCardRanks = $getRank->getRank();
            $dealerSumNumber += $addCardRanks;
            array_push($dealerCardRanks, $addCardRanks);

            $dealerCardRanks = $this->aceCheck($dealerCardRanks)[0];
            $dealerSumNumber = $this->aceCheck($dealerCardRanks)[1];
        }
        return $dealerCardRanks;
    }
}
