<?php
// Tanken är att ta bort användare sessionbaserat
session_start();
include 'db_connection.php';
$conn = openCon("login");
echo "user deleted";
?>