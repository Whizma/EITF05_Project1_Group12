<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "testDB";

// mySQLi (improved) skyddar mot injections, man kan använda mysql() men den är deprekerad
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);

return $conn;

}

function CloseCon($conn)
{
    mysqli_close($conn);
}


?>