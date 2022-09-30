<?php
include "login/db_connection.php";
$conn = openCon("products");
echo "hej";

$table_name = "product_table";

$sqlTruncate = "TRUNCATE TABLE $table_name";

if(mysqli_query($conn, $sqlTruncate)) {
    echo "Truncation successfull...". "<br>\n";
} else {
    echo "Problem with truncation";
    exit();
}

$insert_products = "INSERT INTO $table_name (id, name, price, img)
    VALUES (1, 'string', '12.0', 'string.jpeg'),
            (2, 'transparent', '14.5', 'trans.jpeg')";

if(mysqli_query($conn, $insert_products)){
    echo "Database populated";
} else {
    echo "Failed to populate database";
}

echo "hej";

closeCon($conn);
?>