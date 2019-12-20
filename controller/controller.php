<?php

require '../model/model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //IF YOU PRESS ON THE BUTTON STARTGAME
    if(isset($_POST['startgame'])){
        
        //DRAW 2 CARDS FOR EACH PLAYER
        drawCard($player, 2, $deckOfCards);
        drawCard($dealer, 2, $deckOfCards);
        //THE FIRST CARD OF THE DEALER NEEDS TO BE TURNED SO THE PLAYER CAN'T SEE IT
        $cardsDealer = $dealer->getCards();
        $cardsDealer[0]->turn();

        //SAVE THE OBJECTS INTO THE SESSION VARIABLE    
        $_SESSION['player'] = $player;
        $_SESSION['dealer'] = $dealer;

        // var_dump($dealer);
        //CHANGE STATUS MESSAGE 
        $statusMessage = "Game in progress";
    }

    //IF YOU PRESS HIT
    if(isset($_POST['hit'])){
        drawCard($_SESSION['player'], 1, $deckOfCards);
        // $_SESSION['curCardPlayer'] = $player->Hit();
        // $_SESSION['player']->score += $_SESSION['curCardPlayer'];

        // $_SESSION['curCardDealer'] = $dealer->Hit();
        // $_SESSION['dealer']->score += $_SESSION['curCardDealer'];

        // if($_SESSION['player']->score > 21){
        //     $statusMessage = "Player has Lost!";
        // }
        // elseif($_SESSION['player']->score === 21){
        //     //$statusMessage = handleStand($player,$dealer);
        //     $statusMessage = $player->Stand();
        // }
        // elseif($_SESSION['dealer']->score > 21){
        //     $statusMessage = "Player won!";
        // }
        // elseif($_SESSION['dealer']->score === 21){
        //     $statusMessage = "Player has Lost!";
        // }
    }

    //IF YOU PRESS STAND
    if(isset($_POST['stand'])){
        $statusMessage = handleStand($player,$dealer);
        //$statusMessage = $player->Stand();
    }

    //IF YOU PRESS SURRENDER
    if(isset($_POST['surrender'])){
        //CHANGE STATUS MESSAGE 
        $statusMessage = $player->surrender();
    }
}
?>
