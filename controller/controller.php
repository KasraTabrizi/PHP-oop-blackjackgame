<?php

require '../model/model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //IF YOU PRESS ON THE BUTTON STARTGAME
    if(isset($_POST['startgame'])){
        //SAVE THE OBJECTS INTO THE SESSION VARIABLE    
        $_SESSION['player'] = $player;
        $_SESSION['dealer'] = $dealer;
        // //SAVE CURRENT CARD OF PLAYER AND DEALER INTO SESSION VARIABLE
        // $_SESSION['curCardPlayer'] = 0;
        // $_SESSION['curCardDealer'] = 0;

        // $_SESSION['cardsOfPlayer'] = array(5);
        // $_SESSION['cardsOfDealer'] = array(5);

        // //CREATE SESSION FOR MAXIMUM OF 5 CARDS FOR THE PLAYER AND 5 CARDS FOR THE DEALER 
        // for($i = 0; $i < 5; $i++){
        //     $_SESSION["playerCard$i"] = '';
        // }
        // for($i = 0; $i < 5; $i++){
        //     $_SESSION["dealerCard$i"] = '';
        // }

        // $_SESSION['counter'] = 0;

        //DRAW TWO CARDS IMMEDIATELY FOR THE PLAYER AND DEALER AND LOAD IT INTO THE SCORE AND DISPLAY THE CARDS ON THE PAGE
        // generateCard($player, $dealer);
        // generateCard($player, $dealer);

        drawCard($player, 2, $deckOfCards);
        drawCard($dealer, 2, $deckOfCards);

        var_dump($player);
        //CHANGE STATUS MESSAGE 
        $statusMessage = "Game in progress";
    }

    //IF YOU PRESS HIT
    if(isset($_POST['hit'])){
        $_SESSION['curCardPlayer'] = $player->Hit();
        $_SESSION['player']->score += $_SESSION['curCardPlayer'];

        $_SESSION['curCardDealer'] = $dealer->Hit();
        $_SESSION['dealer']->score += $_SESSION['curCardDealer'];

        if($_SESSION['player']->score > 21){
            $statusMessage = "Player has Lost!";
        }
        elseif($_SESSION['player']->score === 21){
            //$statusMessage = handleStand($player,$dealer);
            $statusMessage = $player->Stand();
        }
        elseif($_SESSION['dealer']->score > 21){
            $statusMessage = "Player won!";
        }
        elseif($_SESSION['dealer']->score === 21){
            $statusMessage = "Player has Lost!";
        }
    }

    //IF YOU PRESS STAND
    if(isset($_POST['stand'])){
        $statusMessage = handleStand($player,$dealer);
        //$statusMessage = $player->Stand();
    }

    //IF YOU PRESS SURRENDER
    if(isset($_POST['surrender'])){
        //CHANGE STATUS MESSAGE 
        $statusMessage = $player->Surrender();
    }
}
?>
