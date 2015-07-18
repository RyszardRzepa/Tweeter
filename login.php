<?php

header('Content-type: text/html; charset=utf-8');
require_once("user.php");
require_once("conn.php");
session_start();

if($_SERVER["REQUEST_METHOD"]=== "POST") {
    $newUser = new User();
    $newUser->login($conn, $_POST["name"], $_POST["password"]);{

        if($newUser->getId() != -1){
            $_SESSION["user_id"]= $newUser->getId();
            header('Location:http://localhost/workshop/index.php');
            die();
        }else{
            echo ("Blad  podzczas logowania <br>");
        }
    }
}

?>


<form method="post" action="#">
    <label> Nazwa Uzytkownika :</label><br>
    <input name="name" type="text" maxlengt="255" value=""/><br>
    <label>Haslo:</label><br>
    <input name="password" type="password" maxlengt="255" value=""/><br>
    <button type="submit">wyslij </button>

</form>
