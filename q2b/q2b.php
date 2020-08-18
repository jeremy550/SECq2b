<?php

if(isset($_POST['g-recaptcha-response'])){
    if(isset($_POST['email']) & isset($_POST['password'] )& isset($_POST['confirm'])){
       $email= $_POST['email'];
       $password= $_POST['password'];
       $confirm= $_POST['confirm'];


$secretKey= '6LdhFbUZAAAAAGW5sIvOaUCp_1hdFKDM-P85eqX9';
$request =$_POST['g-recaptcha-response'];
$remoteip= $_SERVER['REMOTE_ADDR'];
$url='https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$request.'&remoteip='.$remoteip;
$response = file_get_contents($url);
$responseKey=json_decode($response,true);



if($responseKey["success"]) {
    echo '<h2>Account created.</h2>';
} else {
    echo '<h2>Your are a spammer!!!</h2>';
}
    }
}

?>
