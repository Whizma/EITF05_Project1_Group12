<?php

include 'db_connection.php';

$conn = OpenCon();

$sql = 'INSERT INTO testUser(Username, Hash, Salt)
        VALUES ("Isak", "1234", "56")';
echo "Test select DB";
mysqli_select_db($name,"testDB") or die("can't find it");

if(mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "problem här";
}

CloseCon($conn);

?>