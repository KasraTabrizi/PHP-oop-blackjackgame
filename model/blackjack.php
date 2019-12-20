<?php
    class BlackJack{
        //properties
        public $score = 0;
        private $cards = array();
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
            return true;
        }

        function addCard($card){
            array_push($this->cards, $card);
        }

        function getCards(){
            return $this->cards;
        }
    }

    class Cards{
        //properties
        public $suite;
        public $cardName;
        public $color;
        public $image;
        private $side = false; //true = front side of card; false = back side of card (default)

        //constructor
        public function __construct($suite, $cardName, $color, $image){
            $this->suite = $suite;
            $this->cardName = $cardName;
            $this->color = $color;
            $this->image = $image;
        }
        //methods
        //get the side of the card
        public function getSide(){
            return $this->side;
        }
        //turn card
        public function turn(){
            $this->side = !$this->side;
        }
    }
?>