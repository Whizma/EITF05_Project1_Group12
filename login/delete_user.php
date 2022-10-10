<?php 

session_start();
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (hash_equals($_POST["token"], $token)) {
        $_SESSION['response'] = http_response_code(418);
        $_SESSION['header'] = header($_SERVER["SERVER_PROTOCOL"] . " 418 I'm a teapot", true, 418);
    } else {
        // döda skiten
        $_SESSION['response'] = http_response_code(405);
        $_SESSION['header'] = header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    }
}
?>
<!DOCTYPE html>
<html>
    <body>
    <form action="process_delete_user.php" method ="POST">
         Write confirm to delete account: <input type= "text" name="mkkk"> <br>
        <input type ="submit" name = "submit">
        <input type ="hidden" name = "token" value = <?php echo $token?>>
    </form>
    </body>
</html>
