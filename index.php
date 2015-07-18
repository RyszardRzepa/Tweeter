<?php

include ("header.php");
echo "dziala <br>";



$loggedUser =new User();
$loggedUser->loadFromDB($conn, $_SESSION["user_id"]);

echo ("<h1> Witaj ".$loggedUser->getName()."</h1><br>");
echo"MOje Tweety";

$tweets = $loggedUser->getAllPost($conn, 40);

foreach($tweets as $tweet){
    echo ("Tweet: <br>");
    //TODO : wypisac dane o tweecie z obiektu Tweet
}

include ("footer.php");


