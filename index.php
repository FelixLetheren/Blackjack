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
            case strpos($data, 'Ace') !== false:
                return 11;
                break;
            case strpos($data, 'King') !== false || strpos($data, 'Queen') !== false || strpos($data, 'Jack') !== false:
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
    $suits = ['clubs', 'hearts', 'spades', 'diamonds'];
    $cardNumbers = ['Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King'];
    return array(getCardNumber($cardNumbers), getSuit($suits));

}

/**
 * @param int $score1 Your score
 * @param int $score2 Opponent's Score
 * @return string win/loss text
 * Takes 2 scores and determines the winner
 */
function whoWins( int $score1, int $score2): string
{
    switch ($score1) {
        case $score1 > 21 && $score2 <= 21;
            return 'Bust! You Loose!';
            break;
        case $score1 <= 21 && $score2 > 21;
            return 'Bust! You Win!';
            break;
        case $score1 > 21 && $score2 > 21;
            return 'You\'re both bust! Draw!';
            break;
        case $score1 > $score2;
            return 'You win!';
            break;
        case $score1 < $score2;
            return 'You loose!';
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
$firstScore = getScore($firstCardArray);
$secondScore = getScore($secondCardArray);
$totalScore = $firstScore + $secondScore;
$foeCardScore = getScore($foeCardArray);
$foeSecondCardScore = getScore($foeSecondCardArray);
$foeTotalScore = $foeCardScore + $foeSecondCardScore;


echo 'You have the ' . implode(' of ', $firstCardArray) . '. That is worth ' . $firstScore . '<br>';
echo 'You also have the ' . implode(' of ', $secondCardArray) . ' which is worth ' . $secondScore . '<br>';
echo 'So in total that\'s ' . $totalScore;
echo '<br>';
echo 'Your opponent has the ' . implode(' of ', $foeCardArray) . ' That is worth ' . $foeCardScore . '<br>';
echo 'Your opponent also has the ' . implode(' of ', $foeSecondCardArray) . ' That is worth ' . $foeSecondCardScore . '<br>';
echo 'So in total that\'s ' . $foeTotalScore . '<br>';
echo whoWins($totalScore, $foeTotalScore);

