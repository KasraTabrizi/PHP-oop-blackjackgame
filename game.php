<?php 
//this line makes PHP behave in a more strict way
declare(strict_types=1);
//we are going to use session variables so we need to enable sessions
session_start();
//include blackjack.php file which contains the blackjack clas
require 'blackjack.php'; 

$test = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $test = 1;
}





//include the form-view php file and give error if something happens
require 'home.php';
?>