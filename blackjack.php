<?php
    class Blackjack{
        //properties
        public $score = 0;
        //methods
        public function Hit(){
            //return  rand(1 , 11); //return a number between 1 and 11
            //return an array with the first index a random number between 0 and 3 and the second index a randon number between 1 and 11.
            //because the deckofCards array is a 2D array that contains an array for each suit and each suit has an array of the cards
            return array(rand(0 , 3), rand(0 , 12)); 
        }

        function Stand(){

        }

        function Surrender(){
            return "Player has Lost!";
        }

    }

    class Cards{
        //properties
        
        //methods
    }
?>