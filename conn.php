<?php
$servername = "localhost";
$username = "robin";
$password = "culprit";
$database = "dropdown";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully" . "\n";
?>
