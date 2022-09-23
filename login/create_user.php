<?php
include 'db_connection.php';
$conn = OpenCon("login");

$username = $_GET["name"];
$password = $_GET["password"];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT IGNORE INTO user_details (username, hash)
        VALUES ('$username', '$password_hash')";

if(mysqli_query($conn, $sql)) {
    echo "Welcome " . $username;
} else {
    echo "Error: Username already exists";
}

CloseCon($conn);
?>