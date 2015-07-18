<?php

include("header.php");

$loggedUser =new User();
$loggedUser->loadFromDB($conn, $_SESSION["user_id"]);

$sqlToAllUsersId = "SELECT id FROM User ";
$result = $conn->query($sqlToAllUsersId);
if($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {


        $tempUser = new User();
        $tempUser->loadFromDB($conn, $row["id"]);

        echo($tempUser->generateLinkToMyPage());
        echo "<br>";
    }
}
include "footer.php";
