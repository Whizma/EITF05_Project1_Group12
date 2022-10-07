<?php
// Tanken är att ta bort användare sessionbaserat
session_start();
include 'db_connection.php';
$conn = openCon("login");
echo "user deleted";
if(hash_equals($_POST['token'], $_SESSION['token'])){
    echo "User deleted";

} else {
    echo "Post: " . $_POST['token'] . " Session: " . $_SESSION['token'];
    echo "Token does not match";
}

?>