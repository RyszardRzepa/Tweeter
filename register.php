<?php

header('Content-type: text/html; charset=utf-8'); // nie moze byc nic przed 'header', ( zadnych informacji)
require_once("user.php");
require_once("conn.php");
session_start();

if($_SERVER["REQUEST_METHOD"]=== "POST"){
    var_dump($_POST);
    echo"br>";
    $newUser = new User();
    $newUser->register($conn, $_POST["name"], $_POST["desc"],
                                $_POST["password"],$_POST["password_2"]);
    if($newUser->getId()!= -1){
        echo"User registered  propertly<br>";

    }else {
        echo" Feil registered";
    }
}

?>

        <P><h3>System Logowania</h3></P>
<form method="post" action="#">
    <label> Nazwa uzytkownika : </label><br>
    <input name="name" type="text" maxlengt="255" value=""/><br>
    <label>Email:</label><br>
    <input name="desc" type="text" maxlengt="255" value=""/><br>
    <label>Haslo:</label><br>
    <input name="password" type="password" maxlengt="255" value=""/><br>
    <label>Powtorz Haslo:</label><br>
    <input name="password_2" type="password" maxlengt="255" value=""/><br>
    <button type="submit">wyslij </button>
</form>
