<?php
include("header.php");

$loggedUser =new User();
$loggedUser->loadFromDB($conn, $_SESSION["user_id"]);

if($_SERVER["REQUEST_METHOD"]=="Post"){

    $loggedUser->saveToDB($conn,
        $_POST["desc"],
        $_POST["password"],
        $_POST["password_2"]);
}
?>

<form method="post" action="#">

    <label>Email:</label><br>
    <input name="desc" type="text" maxlengt="255" value=""/><br>
    <label>Haslo:</label><br>
    <input name="password" type="password" maxlengt="255" value=""/><br>
    <label>Powtorz Haslo:</label><br>
    <input name="password_2" type="password" maxlengt="255" value=""/><br>
    <button type="submit">wyslij </button>
</form>

include "footer.php";
