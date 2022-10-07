<?php
// Tanken är att ta bort användare sessionbaserat
session_start();
include 'db_connection.php';
$conn = openCon("login");

if($_POST['token'] == $_SESSION['token']){
    echo "Token does not match";
} else {
    echo "User deleted";
}

?>