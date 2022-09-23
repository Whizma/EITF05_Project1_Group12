<?php

include 'db_connection.php';

$conn = OpenCon();

echo "Connected to DB ";

mysqli_select_db($conn, "testDB");

$sql = "INSERT INTO testUser (Username, Hash, Salt)
        VALUES ('Isak' , '1234' , '56')";

if(mysqli_query($conn, $sql)) {
    echo "New reccord created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


CloseCon($conn);

?>