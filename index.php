<?php require 'game.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BlackJack(ish)</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div class="container">
    <h1>Blackjack for Nerds</h1>
    <div class="left-box">
        <h2>Player 1</h2>
        <div class="player1-container">
            <div class="card">
                <?php echo '<span class="card-value">' . implode(' of ', $firstCardArray) . '</span>' ?>
            </div>
            <div class="card">
                <?php echo '<span class="card-value">' . implode(' of ', $secondCardArray) . '</span>' ?>
            </div>
        </div>
    </div>
    <div class="right-box">
        <h2>Player 2</h2>
        <div class="player2-container">
            <div class="card">
                <?php echo '<span class="card-value">' . implode(' of ', $foeCardArray) . '</span>' ?>
            </div>
            <div class="card">
                <?php echo '<span class="card-value">' . implode(' of ', $foeSecondCardArray) . '</span>' ?>
            </div>
        </div>
    </div>
    <div class="results-container">
        <?php echo '<span class="result">' . whoWins($totalScore, $foeTotalScore) . '</span>' ?>
    </div>
</div>

</body>
</html>