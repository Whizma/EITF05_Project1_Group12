<?php
include 'db_connection.php';
$conn = openCon("login");

$username = $_POST["name"];
$password = $_POST["password"];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);

if(!$uppercase || !$lowercase || strlen($password) < 8) {
    Echo "Password too weak";
    exit();
    closeCon($conn);
}

$sqlUsernameCheck = "SELECT username
                    FROM user_details
                    WHERE username = '$username'";


//Check if username already exists
$usernameCheck =  mysqli_query($conn, $sqlUsernameCheck);

if(mysqli_num_rows($usernameCheck) > 0){
    echo "Error: Username already exists";
    closeCon($conn);
    exit();
}


$sql = "INSERT INTO user_details (username, hash)
        VALUES ('$username', '$password_hash')";

mysqli_query($conn, $sql);
echo "Welcome " . $username;


//Inorder to display username on all pages, use $username = $_POST["username"]; and echo $username

closeCon($conn);
?>