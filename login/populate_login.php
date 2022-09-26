<?php
include 'db_connection.php';
$conn = openCon("login");
$sqlTruncate = "TRUNCATE TABLE user_details";

if(mysqli_query($sqlTruncate)) {
    echo "Truncation successfull... ";
} else {
    echo "Problem with truncation";
}
$passwordErik = password_hash("Malmgren", PASSWORD_DEFAULT);
$passwordIsak = password_hash("Määttä", PASSWORD_DEFAULT);
$passwordIda = password_hash("Levison", PASSWORD_DEFAULT);
$sqlPopulate = "INSERT INTO user_details (username, hash)
                VALUES  ('Erik', '$passwordErik'),
                        ('Isak', '$passwordIsak')
                        ('Ida', '$passwordIda')";

if(mysqli_query($sqlPopulate)){
    echo "Database populated";
} else {
    echo "Failed to populate database";
}

closeCon($conn);
?>