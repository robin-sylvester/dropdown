<?php
include "conn.php";

$sql = "SET FOREIGN_KEY_CHECKS = 0";
mysqli_query($conn, $sql);

$sql = "SELECT NavMenu FROM information_schema.tables WHERE table_schema = dropdown";
$result = mysqli_query($conn, $sql);

$sql = "DROP TABLE IF EXISTS NavMenu";
mysqli_query($conn, $sql);

$sql = "SET FOREIGN_KEY_CHECKS = 1";

if (mysqli_query($conn, $sql)) {
    echo "Database successfully removed" . "<br />";
} else {
    echo "Error: " . $sql . "<br />" . mysqli_error($conn);
}

$sql = "CREATE TABLE NavMenu (id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, parent_id int(6), name VARCHAR(50) NOT NULL);";

if (mysqli_query($conn, $sql)) {
    echo "Database successfully created" . "<br />";
} else {
    echo "Error: " . $sql . "<br />" . mysqli_error($conn);
}

include "index.php";
?>

