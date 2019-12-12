<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <h1>Black Jack PHP</h1>
        <form action="game.php" method="POST">
            <input type="submit" value="Start Game" name="startGame">
        </form>
        <h2 id="status-game">Status</h2>
        <div id="player-container">
            <div class="player-box">
                <h3>Player</h3>
                <ul>
                    <li>Drew card number:<?php echo $test; ?> </li>
                    <li>score: </li>
                </ul>
            </div>
            <div class="player-box">
                <h3>Dealer</h3>
                <ul>
                    <li>Drew card number: </li>
                    <li>score: </li>
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