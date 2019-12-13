<?php

    class Blackjack{

        //properties
        public $score = 0;

        //methods
        public function Hit(){
            //$this->score =  rand(1 , 11); 
            return  rand(1 , 11); //return a number between 1 and 11
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