<?php
// Tanken är att ta bort användare sessionbaserat
session_start();
include 'db_connection.php';
$conn = openCon("login");
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
  }
  $token = $_SESSION['token'];
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  
      if (hash_equals($_POST["token"], $token)) {
          // proceed
          header($_SERVER["SERVER_PROTOCOL"]." 418 I'm a teapot", true, 405);
      }
      else {
          // döda skiten
          header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
          exit;
      }
  }
?>