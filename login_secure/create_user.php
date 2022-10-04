<?php
include 'db_connection.php';
$conn = openCon("login");

$username = strip_tags($_POST["name"]);
$password = strip_tags($_POST["password"]);
$address = strip_tags($_POST["address"]);
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);


if(!$uppercase || !$lowercase || strlen($password) < 8) {
    echo "Password too weak";
    exit();
    closeCon($conn);
}

if(strlen($username) == 0){
    echo "Username too short";
    exit();
    closeCon($conn);
}

$sqlPaswordBlacklist = "SELECT bl_pwd
                        FROM blacklist
                        WHERE bl_pwd = '$password'";

$passwordCheck = mysqli_query($conn, $sqlPaswordBlacklist);

if(mysqli_num_rows($passwordCheck) > 0){
    echo "Error: Do not use commonly used passwords";
    closeCon($conn);
    exit();
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


$sql = "INSERT INTO user_details (username, address, hash)
        VALUES ('$username', '$address','$password_hash')";

mysqli_query($conn, $sql);
echo "Welcome " . $username;
$_SESSION['name'] = $username;



//Inorder to display username on all pages, use $username = $_POST["username"]; and echo $username

closeCon($conn);
?>

<?php echo file_get_contents("html/header.html");?>
<?php echo file_get_contents("html/footer.html");?>