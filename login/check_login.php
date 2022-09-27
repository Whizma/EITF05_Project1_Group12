<?php
include 'db_connection.php';
$conn = openCon("login");

$username = $_POST["new_name"];
$password = $_POST["new_password"];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sqlGetHash =  "SELECT hash
                FROM user_details
                WHERE username = '$username'";

$result = mysqli_query($conn, $sqlGetHash);

if(mysqli_num_rows($result) != 1){
    echo "Error: wrong password";
    closeCon($conn);
    exit();
    //Acctually wrong username but the user does not need to know that
}

//Get the sql result and extract the value
$hash = array_values(mysqli_fetch_assoc($result));

if(password_verify($password, $password_hash)){
    echo "Welcome " . $username;
} else {
    echo "Error: Wrong password";
    exit();
}

closeCon($conn);
?>