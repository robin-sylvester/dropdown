<?php
include "conn.php";

if($_POST['parent_id'] == 0)
{
	$sql = "INSERT INTO NavMenu (parent_id, name) VALUES (0,'{$_POST["subject"]}')";

	if (mysqli_query($conn, $sql)) {
    	echo "New record created successfully" . "<br />";
	} else {
    	echo "Error: " . $sql . "<br />" . mysqli_error($conn);
	}
	header("Location: http://robin/dropdown/index.php");
}


if($_POST['parent_id'] > 0)
{
	$sql="INSERT INTO NavMenu (parent_id, name) VALUES ('{$_POST["parent_id"]}','{$_POST["subject"]}')";

	if (mysqli_query($conn, $sql)) {
    	echo "New record created successfully" . "<br />";
	} else {
    	echo "Error: " . $sql2 . "<br />" . mysqli_error($conn);
	}
	header("Location: http://robin/dropdown/index.php");
}

?>
