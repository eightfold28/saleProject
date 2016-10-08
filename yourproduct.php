<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tubeswbd1";

	$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($con->connect_error) {
		die("connection failed: " . $con->connect_error);
	}

	$item_ID=$_GET['item_ID'];

	$sql = "UPDATE item SET isDeleted=1 WHERE item_ID='$item_ID'";

	$con->query($sql);

	$con->close();

	header("Location: yourproduct.html"); exit();
?>