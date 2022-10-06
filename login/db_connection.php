<?php
function openCon($input)
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = $input;

// mySQLi (improved) skyddar mot injections, man kan använda mysql() men den är deprekerad
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);

return $conn;

}

function closeCon($conn)
{
    mysqli_close($conn);
}

function welcomeUser() 
{
    $username = empty($_SESSION["name"]) ? 'guest' : $_SESSION["name"];
    print "Welcome " . $username;
}

function logout() 
{
    session_start();
    //$_SESSION["name"] ="";
    $_SESSION = array();
    if(ini_get("session.use_cookies")){
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}

?>