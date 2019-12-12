<?php 
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//include blackjack.php file which contains the blackjack clas
require 'blackjack.php'; 
//CREATE A OBJECT FOR PLAYER AND DEALER 
$player = new Blackjack();
$dealer = new Blackjack();
//we are going to use session variables so we need to enable sessions
//start session after you initialized the player and dealer object or you will get an null error
session_start();

$cardnumPlayer = 0;
$statusMessage = "";

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

//FUNCTION THAT HANDLES THE STAND
function handleStand($player,$dealer){
    $minValue = 0;
    while($minValue <= 15){
        $_SESSION['curCardDealer'] = $dealer->Hit();
        $_SESSION['dealer']->score += $_SESSION['curCardDealer'];
        $minValue = $_SESSION['dealer']->score;
    }
    if($_SESSION['dealer']->score > 21){
        return "Player won!";
    }
    elseif($_SESSION['dealer']->score === 21 && $_SESSION['player']->score === 21){
        return "A tie!";
    }
    elseif($_SESSION['dealer']->score === $_SESSION['player']->score){
        return "A tie!";
    }
    elseif($_SESSION['dealer']->score > $_SESSION['player']->score){
        return "Dealer won!";
    }
    else{
        return "Player won!";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //IF YOU PRESS ON THE BUTTON STARTGAME
    if(isset($_POST['startgame'])){
        //SAVE THE OBJECTS INTO THE SESSION VARIABLE    
        $_SESSION['player'] = $player;
        $_SESSION['dealer'] = $dealer;
        //SAVE CURRENT CARD OF PLAYER AND DEALER INTO SESSION VARIABLE
        $_SESSION['curCardPlayer'] = 0;
        $_SESSION['curCardDealer'] = 0;
        //DRAW ONE CARD IMMEDIATELY FOR THE PLAYER AND DEALER AND LOAD IT INTO THE SCORE
        $_SESSION['curCardPlayer'] = $player->Hit();
        $_SESSION['player']->score = $_SESSION['curCardPlayer'];

        $_SESSION['curCardDealer'] = $dealer->Hit();
        $_SESSION['dealer']->score = $_SESSION['curCardDealer'];
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
            $statusMessage = handleStand($player,$dealer);
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
    }

    //IF YOU PRESS SURRENDER
    if(isset($_POST['surrender'])){
        //CHANGE STATUS MESSAGE 
        $statusMessage = "Player has Lost!";
    }
}
//include the form-view php file and give error if something happens
require 'home.php';
?>