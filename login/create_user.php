<?php
include 'db_connection.php';
$conn = OpenCon("login");

$username = $_POST["name"];
$password = $_POST["password"];
$password_hash = password_hash($password, PASSWORD_DEFAULT);


$sqlUsernameCheck = "SELECT username
                    FROM user_details
                    where username = '$username'";

// Detta blev inte så bra, querryn kommer alltid returnera true eftersom den går igenom
if(mysqli_query($conn, $sqlUsernameCheck)){
    echo "Username already exists";
    CloseCon($conn);
}


$sql = "INSERT INTO user_details (username, hash)
        VALUES ('$username', '$password_hash')";


if(mysqli_query($conn, $sql)) {
    echo "Welcome " . $username;
} else {
    echo "Error: Username already exists";
}

CloseCon($conn);
?>