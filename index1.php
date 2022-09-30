<?php 
include "login/db_connection.php";
session_start();

$conn = openCon("products");

$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
// Include and show the requested page
include $page . '.php';
?>



