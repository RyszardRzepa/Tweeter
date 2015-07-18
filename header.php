<?php
header('Content-type: text/html; charset=utf-8');

require_once("user.php");
require_once("conn.php");

session_start();

if(isset($_SESSION["user_id"]) != true){
    header('Location:http://localhost/workshop/src/login.php');
    die();
}

echo    ("
<a href='http://localhost/workshop/show_user.php'> Moje konto </a>
<a href='http://localhost/workshop/list_all_users.php'> Lista </a>
<a href='http://localhost/workshop/register.php'> Home </a>
<a href='http://localhost/workshop/edit_user.php'> Edit </a>
");


echo("header.php <br>");
