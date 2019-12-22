<?php 
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//include blackjack.php file which contains the blackjack clas
require 'blackjack.php'; 

//CREATE A OBJECT FOR PLAYER AND DEALER 
$player = new Blackjack();
$dealer = new Blackjack();

//we are going to use session variables so we need to enable sessions
//start session after you initialized the player and dealer object or you will get a null error
session_start();

$statusMessage = "";

//Array of the UNIcode images of the deck of cards
$deckOfCards = array(
    array('&#127185','&#127186','&#127187','&#127188','&#127189','&#127190','&#127191','&#127192','&#127193','&#127194','&#127195','&#127197','&#127198'), //Clubs
    array('&#127169','&#127170','&#127171','&#127172','&#127173','&#127174','&#127175','&#127176','&#127177','&#127178','&#127179','&#127181','&#127182'), //Diamonds
    array('&#127153','&#127154','&#127155','&#127156','&#127157','&#127158','&#127159','&#127160','&#127161','&#127162','&#127163','&#127165','&#127166'), //Hearts
    array('&#127137','&#127138','&#127139','&#127140','&#127141','&#127142','&#127143','&#127144','&#127145','&#127146','&#127147','&#127149','&#127150'), //Spades
    '&#127136', //back of a card
);

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
function handleStand($player,$dealer, $deckOfCards){
    $minValue = 0;
    while($minValue <= 15){
        drawCard($dealer, 1, $deckOfCards);
        calculateScore($dealer);
        $_SESSION['dealer'] = $dealer;
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

// //FUNCTION THAT HANDLES THE STAND
// function handleStand($player,$dealer){
//     $minValue = 0;
//     while($minValue <= 15){
//         drawCard($dealer, 1, $deckOfCards)
//         $_SESSION['curCardDealer'] = $dealer->Hit();
//         $_SESSION['dealer']->score += $_SESSION['curCardDealer'];
//         $minValue = $_SESSION['dealer']->score;
//     }
//     if($_SESSION['dealer']->score > 21){
//         return "Player won!";
//     }
//     elseif($_SESSION['dealer']->score === 21 && $_SESSION['player']->score === 21){
//         return "A tie!";
//     }
//     elseif($_SESSION['dealer']->score === $_SESSION['player']->score){
//         return "A tie!";
//     }
//     elseif($_SESSION['dealer']->score > $_SESSION['player']->score){
//         return "Dealer won!";
//     }
//     else{
//         return "Player won!";
//     }
// }

function calculateScore($player){
    $_SESSION['curCardPlayer'] = $player->Hit(); //generate two random values and pass the array to curCardPlayer
    $_SESSION['cardsOfPlayer'][$_SESSION['counter']] = $_SESSION['curCardPlayer']; //pass the value to the cardsofPlayer SESSION variable
    $player->score = 0;
    foreach($player->getCards() as $card){
        if($card->cardName === 'Ace'){
            $aceValue = array(1,11);
            $player->score += $aceValue[rand(0,1)];
        }
        elseif($card->cardName === 'Jack'){
            $player->score += 10;
        }
        elseif($card->cardName === 'Queen'){
            $player->score += 10;
        }
        elseif($card->cardName === 'King'){
            $player->score += 10;
        }
        else{
            $player->score += intval($card->cardName);
        }
    }
}

//GENERATE A RANDOM CARD, ANALYZE THE CARD, CREATE A CARD OBJECT AND RETURN IT  
function generateRandomCard($playerType, $deckOfCards){
    $randValues = $playerType->hit();
    $randomCardImage = $deckOfCards[$randValues[0]][$randValues[1]];
    $suite;
    $cardName;
    $color;
    //determine the suite and color of the card
    switch($randValues[0]){
        case 0:
            $suite = 'Clubs';
            $color = 'black';
        break;
        case 1:
            $suite = 'Diamonds';
            $color = 'red';
        break;
        case 2:
            $suite = 'Hearts';
            $color = 'red';
        break;
        case 3:
            $suite = 'Spades';
            $color = 'black';
        break;
        default:
        break;
    }
    //determine the card name
    $randValues[1]++;
    if($randValues[1] == 1){
        $cardName = 'Ace';
    }
    elseif($randValues[1] == 11){
        $cardName = 'Jack';
    }
    elseif($randValues[1] == 12){
        $cardName = 'Queen';
    }
    elseif($randValues[1] == 13){
        $cardName = 'King';
    }
    else{
        $cardName = strval($randValues[1]);
    }

    return new Cards($suite, $cardName, $color, $randomCardImage);
}

function showCards($playerCards){
    foreach($playerCards as $card){
        if($card->getSide()){
            echo "<li class='card'>&#127136</li>";
        }
        else{
            echo "<li class='card ".$card->color."'>".$card->image."</li>";
        }
    }
}

//DRAW A GIVEN AMOUNT OF RANDOM CARDS FROM THE DECK AND GIVE IT TO THE PLAYERTYPE
function drawCard($playerType, $amount, $deckOfCards){
    for($i = 0; $i < $amount; $i++){
        $playerType->addCard(generateRandomCard($playerType, $deckOfCards));
    }
}

?>
