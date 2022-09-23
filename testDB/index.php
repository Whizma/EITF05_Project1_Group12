<?php
// gå till localhost/testDB/index.php
include 'db_connection.php';

$conn = OpenCon();

echo "Connected Successfully";

CloseCon($conn);

?>