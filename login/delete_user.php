<?php 

session_start();
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!hash_equals($_POST["token"], $token)) {
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
<!DOCTYPE html>
<html>
    <body>
    <form action="process_delete_user.php" method ="POST">
        Token: <input type= "text" name="token"> <br>
        <input type ="submit">
        <input type ="hidden" name = "token" value = $token
    </form>
    </body>
</html>
