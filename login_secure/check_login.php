<?php
include 'db_connection.php';
$conn = openCon("login");

$username = strip_tags($_POST["new_name"]);
$password = strip_tags($_POST["new_password"]);

$sqlGetHash =  "SELECT hash
                FROM user_details
                WHERE username = '$username'";

$result = mysqli_query($conn, $sqlGetHash);

sleep(1);

if(mysqli_num_rows($result) != 1){
    echo "Error: wrong password";
    closeCon($conn);
    exit();
    //Acctually wrong username but the user does not need to know that
}

//Get the sql result and extract the value
$hash = array_values(mysqli_fetch_assoc($result));

if(password_verify($password, $hash[0])){
    echo "Welcome " . $username;
} else {
    echo "Error: Wrong password";
    exit();
}

closeCon($conn);
?>

<?php echo file_get_contents("../html/header.html");?>
<?php echo file_get_contents("../html/footer.html");?>