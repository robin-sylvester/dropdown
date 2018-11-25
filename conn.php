<?php
$servername = "localhost";
$username = "petar";
$password = "PASSWORD";
$database = "dropdown";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully" . "<br />";
?>
