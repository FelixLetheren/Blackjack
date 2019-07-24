<?php

/***
 * @param array $suit
 * @return string
 * Takes array of suits and randomly selects one which is output as a string
 */
function getSuit(array $suit): string
{
    shuffle($suit);
    return array_pop($suit);
}

/**
 * @param array $number
 * @return string
 * Takes array of card numbers and randomly selects one
 */
function getCardNumber(array $number)
{
    shuffle($number);
    return array_pop($number);

}

/**
 * @param array $card
 * @return int
 * Takes array of card data and turns value of card into a int score
 */
function getScore(array $card): int
{
    foreach ($card as $data)
        switch ($data) {
            case is_integer($data):
                return $data;
                break;
            case strpos($data, 'A') !== false:
                return 11;
                break;
            case strpos($data, 'K') !== false || strpos($data, 'Q') !== false || strpos($data, 'J') !== false:
                return 10;
                break;
            default:
                continue;

        }

}

/**
 * @return array
 * Selects a suit and number and combines the 2 into a "card" array of the 2 values
 */
function makeCard(): array
{
    $suits = ['♣ ', '♥', '♠', '♦'];
    $cardNumbers = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];
    return array(getCardNumber($cardNumbers), getSuit($suits));

}

/**
 * @param int $score1 Your score
 * @param int $score2 Opponent's Score
 * @return string win/loss text
 * Takes 2 scores and determines the winner
 */
function whoWins(int $score1, int $score2): string
{
    switch ($score1) {
        case $score1 > 21 && $score2 <= 21;
            return 'Bust! Player 2 Wins!';
            break;
        case $score1 <= 21 && $score2 > 21;
            return 'Bust! Player 1 Wins!';
            break;
        case $score1 > 21 && $score2 > 21;
            return 'You\'re both bust! Draw!';
            break;
        case $score1 > $score2;
            return 'Player 1 Wins!';
            break;
        case $score1 < $score2;
            return 'Player 2 Wins!';
        case $score1 === $score2;
            return 'Draw!';
        default;
            return 'error';
            break;

    }
}

/**
 * @param $card1
 * @param $card2
 * @param $card3
 * @param $card4
 * @return bool
 * Checks the 4 cards already dealt to see if any of them are duplicates. Returns true if there are duplicates and false if not.
 */
function checkDupes($card1, $card2, $card3, $card4)
{
    if ($card1 === $card2 || $card1 === $card3 || $card1 === $card4 || $card2 === $card3 || $card2 === $card4 || $card3 === $card4) {
        return true;
    } else {
        return false;

    }

}

$firstCardArray = makeCard();
$secondCardArray = makeCard();
$foeCardArray = makeCard();
$foeSecondCardArray = makeCard();

while (checkDupes($firstCardArray, $secondCardArray, $foeCardArray, $foeSecondCardArray)) {
    $firstCardArray = makeCard();
    $secondCardArray = makeCard();
    $foeCardArray = makeCard();
    $foeSecondCardArray = makeCard();
}
$totalScore = getScore($firstCardArray) + getScore($secondCardArray);
$foeTotalScore = getScore($foeCardArray) + getScore($foeSecondCardArray);

