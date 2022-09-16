<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "testDB";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);

return $conn;

}

funciton CloseCon($conn)
{
    $conn -> close();
}


?>