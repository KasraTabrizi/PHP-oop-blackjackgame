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
            
        }

        function Surrender(){
            return true;
        }

    }

?>