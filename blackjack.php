<?php

    class Blackjack{

        //properties
        public $score = 0;

        //methods
        public function Hit(){
            //return  rand(1 , 11); //return a number between 1 and 11
            //return an array with the first index a random number between 0 and 3 and the second index a randon number between 1 and 11.
            //because the deckofCards array is a 2D array that contains an array for each suit and each suit has an array of the cards
            //why between 1 and 11? because in black jack the cards 10, jack, Queen and King have the value 10. Ace can be a value of 1 or 11
            return array(rand(0 , 3), rand(1 , 11)); 
        }

        function Stand(){
            // $minValue = 0;
            // while($minValue <= 15){
            //     $_SESSION['curCardDealer'] = $dealer->Hit();
            //     $_SESSION['dealer']->score += $_SESSION['curCardDealer'];
            //     $minValue = $_SESSION['dealer']->score;
            // }
            // if($_SESSION['dealer']->score > 21){
            //     return "Player won!";
            // }
            // elseif($_SESSION['dealer']->score === 21 && $_SESSION['player']->score === 21){
            //     return "A tie!";
            // }
            // elseif($_SESSION['dealer']->score === $_SESSION['player']->score){
            //     return "A tie!";
            // }
            // elseif($_SESSION['dealer']->score > $_SESSION['player']->score){
            //     return "Dealer won!";
            // }
            // else{
            //     return "Player won!";
            // }
        }

        function Surrender(){
            return "Player has Lost!";
        }

    }

?>