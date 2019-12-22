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

        //Calculate score for the player
        calculateScore($player);

        //SAVE THE OBJECTS INTO THE SESSION VARIABLE    
        $_SESSION['player'] = $player;
        $_SESSION['dealer'] = $dealer;

        //CHANGE STATUS MESSAGE 
        $statusMessage = "Game in progress";
    }

    //IF YOU PRESS HIT
    if(isset($_POST['hit'])){
        $dealer = $_SESSION['dealer'];
        drawCard($_SESSION['player'], 1, $deckOfCards);

        calculateScore($_SESSION['player']);
        calculateScore($dealer);
        //var_dump($_SESSION['player']);

        if($_SESSION['player']->score > 21){
            $statusMessage = "Player has Lost!";
            $cardsDealer = $dealer->getCards();
            $cardsDealer[0]->turn();
            $_SESSION['dealer'] = $dealer;
        }
        elseif($_SESSION['player']->score === 21){
            $statusMessage = handleStand($player,$dealer, $deckOfCards);
            //$_SESSION['dealer'] = $dealer;
        }
        elseif($dealer->score > 21){
            $statusMessage = "Player won!";
            $cardsDealer = $dealer->getCards();
            $cardsDealer[0]->turn();
            $_SESSION['dealer'] = $dealer;
        }
        elseif($dealer->score === 21){
            $statusMessage = "Player has Lost!";
            $cardsDealer = $dealer->getCards();
            $cardsDealer[0]->turn();
            $_SESSION['dealer'] = $dealer;
        }
    }

    //IF YOU PRESS STAND
    if(isset($_POST['stand'])){
        $statusMessage = handleStand($player,$dealer,$deckOfCards);
    }

    //IF YOU PRESS SURRENDER
    if(isset($_POST['surrender'])){
        //CHANGE STATUS MESSAGE 
        if($player->surrender()){
            $statusMessage = "Player has surrendered! Dealer wins";
            $cardsDealer = $_SESSION['dealer']->getCards();
            $cardsDealer[0]->turn();
            calculateScore($_SESSION['dealer']);
        }
    }
}
?>
