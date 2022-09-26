<?php
include 'db_connection.php';
$conn = OpenCon("login");

$username = $_POST["name"];
$password = $_POST["password"];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sqlUsernameCheck = "SELECT username
                    FROM user_details
                    WHERE username = '$username'";


//Check if username already exists
$usernameCheck =  mysqli_query($conn, $sqlUsernameCheck);

if(mysqli_num_rows($usernameCheck) > 0){
    echo "Error: Username already exists";
    CloseCon($conn);
    exit();
}


$sql = "INSERT INTO user_details (username, hash)
        VALUES ('$username', '$password_hash')";

mysqli_query($conn, $sql);
echo "Welcome " . $username;


//Inorder to display username on all pages, use $username = $_POST["username"]; and echo $username

CloseCon($conn);
?>