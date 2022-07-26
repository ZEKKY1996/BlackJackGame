<?php

namespace BlackJack;

require_once('BlackJackCard.php');
require_once('BlackJackHuman.php');

class BlackJackComputer extends BlackJackHuman
{
    public function addComputerCard(int $ComputerNumber, array $computerCardRanks): array
    {
        $addCards = [];

        $computerCardRanks = $this->aceCheck($computerCardRanks)[0];
        $computerSumNumber = $this->aceCheck($computerCardRanks)[1];

        echo 'COM' . $ComputerNumber . 'の現在の得点は' . $computerSumNumber . 'です。' . PHP_EOL;
        while ($computerSumNumber < 17) {
            $addCard = $this->setCard();
            array_push($addCards, $addCard);
            $checkCard = $this->checkCard($addCard);
            echo 'COM' . $ComputerNumber . 'の引いたカードは' . $checkCard . 'です。' . PHP_EOL;
            $getRank = new BlackJackCard($addCard);
            $addCardRanks = $getRank->getRank();
            $computerSumNumber += $addCardRanks;
            array_push($computerCardRanks, $addCardRanks);

            $computerCardRanks = $this->aceCheck($computerCardRanks)[0];
            $computerSumNumber = $this->aceCheck($computerCardRanks)[1];
        }
        return $computerCardRanks;
    }
}
