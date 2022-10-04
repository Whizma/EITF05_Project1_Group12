<!DOCTYPE html>
<?php echo file_get_contents("../html/header.html");?>

<html>
    <body>
        <form action ="check_login.php" method="post">
            Username: <input type = "text" name="new_name"><br>
            Password: <input type = "password" name="new_password"><br>
            <input type ="submit">
        </form>
    </body>
</html>


<?php echo file_get_contents("../html/footer.html");?>