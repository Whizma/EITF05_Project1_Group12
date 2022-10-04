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
}

?>