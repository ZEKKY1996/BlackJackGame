<?php

namespace BlackJack;

require_once('BlackJackCard.php');
require_once('BlackJackHuman.php');

class BlackJackPlayer extends BlackJackHuman
{
    public function addPlayerCard(array $playerCardRanks): array
    {
        $addCards = [];
        $playerCardRanks = $this->aceCheck($playerCardRanks)[0];
        $playerSumNumber = $this->aceCheck($playerCardRanks)[1];

        while ($playerSumNumber < 21) {
            echo 'あなたの現在の得点は' . $playerSumNumber . 'です' . PHP_EOL;
            echo 'カードを引きますか？[Y/N]を入力' . PHP_EOL;
            $answer = trim(fgets(STDIN));

            if ($answer == 'Y') {
                $addCard = $this->setCard();
                array_push($addCards, $addCard);
                $checkCard = $this->checkCard($addCard);
                echo 'あなたの引いたカードは' . $checkCard . 'です。' . PHP_EOL;
                $getRank = new BlackJackCard($addCard);
                $addCardRanks = $getRank->getRank();
                $playerSumNumber += $addCardRanks;
                array_push($playerCardRanks, $addCardRanks);

                $playerCardRanks = $this->aceCheck($playerCardRanks)[0];
                $playerSumNumber = $this->aceCheck($playerCardRanks)[1];
            } elseif ($answer == 'N') {
                break;
            } else {
                echo 'Y または N を半角で入力してください' . PHP_EOL . PHP_EOL;
            }
        }
        return $playerCardRanks;
    }
}
