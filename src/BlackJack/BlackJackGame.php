<?php

namespace BlackJack;

require_once('BlackJackCard.php');
require_once('BlackJackDealer.php');
require_once('BlackJackPlayer.php');
require_once('BlackJackComputer.php');
require_once('BlackJackDecideWinner.php');
require_once('BlackJackHandEvaluator.php');

class BlackJackGame
{
    private const RESULT_TYPE = 3; //勝ち、負け、引き分けの３種類

    public function start(array $cards): array //$cards[0]'Dealer' [1]'Player' [2]'COM1' [3]'COM2
    {
        $humanNumbers = count($cards);
        foreach ($cards as $card) {
            $humanCards[] = array_map(fn ($humanCard) => new BlackJackCard($humanCard), $card);
        }
        for ($i = 0; $i < $humanNumbers; $i++) {
            $humanCardRanks[] = array_map(fn ($humanCard) => $humanCard->getRank(), $humanCards[$i]);
        }

        $addPlayerCards = new BlackJackPlayer();
        $playerCardRank = array_merge($cards[1], $addPlayerCards->addPlayerCard($humanCardRanks[1]));

        $addComputerCards = new BlackJackComputer();
        for ($i = 2; $i < $humanNumbers; $i++) {
            $computerCardRank[$i - 1] = array_merge($cards[$i], $addComputerCards->addComputerCard($i - 1, $humanCardRanks[$i]));
        }

        $checkDealerCard = new BlackJackHuman();
        echo 'ディーラーの2枚目のカードは' . $checkDealerCard->checkCard($cards[0][1]) . 'でした。' . PHP_EOL;

        $addDealerCards = new BlackJackDealer();
        $dealerCardRank = array_merge($cards[0], $addDealerCards->addDealerCard($humanCardRanks[0]));

        $handEvaluator = new BlackJackHandEvaluator();
        $humanSumNumbers[] = $handEvaluator->getSumNumber($dealerCardRank);
        $humanSumNumbers[] = $handEvaluator->getSumNumber($playerCardRank);
        for ($i = 2; $i < $humanNumbers; $i++) {
            $humanSumNumbers[] = $handEvaluator->getSumNumber($computerCardRank[$i - 1]);
        }

        $decideWinner = new BlackJackDecideWinner();
        $results = $decideWinner->decideWinner($humanSumNumbers);
        return [$humanSumNumbers, $results];
    }
    public function setComputer(): int
    {
        echo 'COMの人数を入力してください[ 0 / 1 / 2 ](半角数字で入力)' . PHP_EOL;
        $comNumber = fgets(STDIN);
        while ($comNumber < 0 ||  2 < $comNumber) {
            echo 'COMの人数を 0 ～ 2 の半角数字で入力してください[ 0 / 1 / 2 ]' . PHP_EOL;
            $comNumber = fgets(STDIN);
        }
        return $comNumber;
    }
    public function shuffleCard(int $comNumber): array
    {
        $shuffleCard = new BlackJackHuman();

        for ($i = 0; $i < $comNumber + 2; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $cards[$i][$j] = $shuffleCard->setCard();
                $cardName[$i][$j] = $shuffleCard->checkCard($cards[$i][$j]);
                if ($i === 1) {
                    echo 'あなたのカードは' . $cardName[$i][$j] . 'です。' . PHP_EOL;
                }
                if ($i > 1) {
                    echo 'COM' . $i - 1 . 'のカードは' . $cardName[$i][$j] . 'です。' . PHP_EOL;
                }
            }
        }
        echo 'ディーラーのカードは' . $cardName[0][0] . 'です。' . PHP_EOL;
        echo 'ディーラーの２枚目のカードは非公開です。' . PHP_EOL;

        return $cards;
    }
    public function resultAnnouncement(array $results)
    {
        echo 'あなたの点数は' . $results[0][1] . 'です。' . PHP_EOL;
        for ($i = 2; $i < count($results[0]); $i++) {
            echo 'COM' . $i - 1 . 'の点数は' . $results[0][$i] . 'です。' . PHP_EOL;
        }
        echo 'ディーラーの点数は' . $results[0][0] . 'です。' . PHP_EOL;

        $humanName = new BlackJackHuman();
        for ($i = 0; $i < self::RESULT_TYPE; $i++) {
            if (empty($results[1][$i]) === false) {
                foreach ($results[1][$i] as $result) {
                    $result = $humanName->checkHuman($result);
                    if ($i === 0) {
                        echo $result . '：勝ち！' . PHP_EOL;
                    } elseif ($i === 1) {
                        echo $result . '：負け！' . PHP_EOL;
                    } else {
                        echo $result . '：引き分け！' . PHP_EOL;
                    }
                }
            }
        }
    }
}

echo 'ブラックジャックを開始します。' . PHP_EOL;
$blackJackGame = new BlackJackGame();
$comNumber = $blackJackGame->setComputer();
$cards = $blackJackGame->shuffleCard($comNumber);
$results = $blackJackGame->start($cards);
$blackJackGame->resultAnnouncement($results);

echo 'ブラックジャックを終了します。' . PHP_EOL;
