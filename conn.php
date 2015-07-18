<?php

$conn = new mysqli("localhost","root","","workshop");

if($conn->error){
    echo("Error connection to data base:");
    echo($conn->error."<br>");
    die();
}
