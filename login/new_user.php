<!DOCTYPE html>
<?php echo file_get_contents("../html/header.html");?>
<html>
    <body>
        <form action ="create_user.php" method="post">
            Username: <input type = "text" name="name"><br>
            Password: <input type = "password" name="password"><br>
            Address: <input type = "text" name="address"><br>
            <input type ="submit">
        </form>
    </body>
</html>



<?php echo file_get_contents("../html/footer.html");?>