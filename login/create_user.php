<html>
<body>

<?php
include 'testDB/db_connection.php';
echo "include conn.php";
$conn = OpenCon();
echo "opencon";
mysqli_select_db($conn, "login");

echo "Selected DB";

$username = $_GET["name"];
$password = $_GET["password"];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT IGNORE INTO user_details (username, hash)
        VALUES ($username, $password_hash)";

if(mysqli_query($conn, $sql)) {
    echo "Welcome" + $_GET["name"];
} else {
    echo "Error: Username already exists";
}

?>

</body>
</html>