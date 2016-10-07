<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "wbd";

	$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($con->connect_error) {
		die("connection failed: " . $con->connect_error);
	}

	$item_name=$_GET['item_name'];

	$sql = "UPDATE item SET deleted=1 WHERE item_name='$item_name'";

	$con->query($sql);

	$con->close();

	header("Location: yourproduct.html"); exit();
?>