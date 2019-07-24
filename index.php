<?php


$suits = ['club', 'heart', 'spade', 'diamond'];
$cardNumbers = ['Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King'];

/***
 * @param array $suit
 * @return string
 * Takes array of suits and randomly selects one
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

function makeCard(): array
{
    $suits = ['clubs', 'hearts', 'spades', 'diamonds'];
    $cardNumbers = ['Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King'];
    return array(getCardNumber($cardNumbers), getSuit($suits));

}
function whoWins($score1, $score2)
{
    switch ($score1) {
        case $score1 >= 21 && $score2 < 21;
            return 'Bust! You Loose!';
            break;
        case $score1 < 21 && $score2 >= 21;
            return 'Bust! You Win!';
            break;
        case $score1 >= 21 && $score2 >= 21;
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

$firstCardArray = makeCard();
$firstScore = getScore($firstCardArray);
$secondCardArray = makeCard();
$secondScore = getScore($secondCardArray);
$totalScore = $firstScore + $secondScore;

$foeCardArray = makeCard();
$foeCardScore = getScore($foeCardArray);
$foeSecondCardArray = makeCard();
$foeSecondCardScore = getScore($foeSecondCardArray);
$foeTotalScore = $foeCardScore + $foeSecondCardScore;

echo 'You have the ' . implode(' of ', $firstCardArray). '. That is worth ' .$firstScore. '<br>';
echo 'You also have the ' .implode(' of ', $secondCardArray). ' which is worth ' .$secondScore. '<br>';
echo 'So in total that\'s ' .$totalScore;
echo '<br>';
echo 'Your opponent has the ' .implode(' of ', $foeCardArray). ' That is worth ' .$foeCardScore. '<br>';
echo 'Your opponent also has the ' .implode( ' of ', $foeSecondCardArray). ' That is worth ' .$foeSecondCardScore. '<br>';
echo 'So in total that\'s' .$foeTotalScore.'<br>';
echo whoWins($totalScore, $foeTotalScore);
