<?php

include("header.php");

$loggedUser =new User();
$loggedUser->loadFromDB($conn, $_SESSION["user_id"]);
if(isset($_GET["user_id"])== true){
    $userToShow = new User();
    $userToShow->loadFromDB($conn, $_GET["user_id"]);

    $userToShow->showUser();
}else{
    $loggedUser->showUser();
}





include "footer.php";

