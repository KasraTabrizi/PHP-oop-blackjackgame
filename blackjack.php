<?php

    class Blackjack{

        //properties
        $score = 0;

        //methods
        function Hit(){
            return rand(1 , 11); //return a number between 1 and 11
        }

        function Stand(){
            
        }

        function Surrender(){
            return true;
        }

    }

?>