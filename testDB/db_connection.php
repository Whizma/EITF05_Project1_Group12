<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "testDB";

// mySQLi skyddar mot injections, man kan använda mysql() men den är deprekerad
$conn = new mysqli($dbhost, $dbuser, $dbpass) or die("Connect failed: %s\n". $conn -> error);

return $conn;

}

function CloseCon($conn)
{
    $conn -> close();
}


?>