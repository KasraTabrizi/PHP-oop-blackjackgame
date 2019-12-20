<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Black Jack PHP</title>
    <style>
    <?php include 'styles/css/main_styles.css' ?>
    </style>
</head>

<body>
    <div id="wrapper">
        <h1>Black Jack PHP</h1>
        <form action="game.php" method="POST">
            <input type="submit" value="Start Game" name="startgame">
        </form>
        
        <div id="player-container">
            <div class="player-box">
                <h3>Player score:<?php echo $_SESSION['player']->score;?></h3>
                <ul>
                    <?php showCards($player->getCards()); ?>
                    <li class="card"><?php echo $deckOfCards[$_SESSION['cardsOfPlayer'][0][0]][$_SESSION['cardsOfPlayer'][0][1]];?></li>
                    <li class="card"><?php echo $deckOfCards[$_SESSION['cardsOfPlayer'][1][0]][$_SESSION['cardsOfPlayer'][1][1]];?></li>
                    <li class="card"></li>
                    <li class="card"></li>
                    <li class="card"></li>
                </ul>
            </div>
            <div class="player-box">
                <h2 id="status-game">
                    <?php echo $statusMessage; ?>
                </h2>
            </div>
            <div class="player-box">
                <h3>Dealer score:<?php echo $_SESSION['dealer']->score;?></h3>
                <ul>
                    <?php showCards($dealer->getCards()); ?>
                    <li class="card"><?php echo $deckOfCards[$_SESSION['cardsOfDealer'][0][0]][$_SESSION['cardsOfDealer'][0][1]];?></li>
                    <li class="card"><?php echo $deckOfCards[$_SESSION['cardsOfDealer'][1][0]][$_SESSION['cardsOfDealer'][1][1]];?></li>
                    <li class="card"></li>
                    <li class="card"></li>
                    <li class="card"></li>
                </ul>
            </div>
        </div>
        <div id="buttons-container">
            <form action="game.php" method="POST">
                <input type="submit" value="Hit" name="hit">
                <input type="submit" value="Stand" name="stand">
                <input type="submit" value="Surrender" name="surrender">
            </form>
        </div>
    </div>
</body>

</html>