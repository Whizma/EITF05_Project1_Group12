<?php
session_start();
include 'db_connection.php';
$conn = openCon("login");

$username = strip_tags($_POST["new_name"]);
$password = strip_tags($_POST["new_password"]);

$stmt = $conn->prepare("SELECT hash, address
                        FROM user_details
                        WHERE username = ?");

$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

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
    $_SESSION['name'] = $username;
    $_SESSION['token'] = bin2hex(random_bytes(32));

} else {
    echo "Error: Wrong password";
    exit();
}

closeCon($conn);
?>

<?php echo file_get_contents("../html/header.html");?>
<?php echo file_get_contents("../html/footer.html");?>