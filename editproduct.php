<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "wbd";

	$item_id = $_GET['item_ID'];
	$item_name = $_POST['item_name'];
	$item_desc = $_POST['item_desc'];
	$item_price = $_POST['item_price'];

	$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($con->connect_error) {
		die("connection failed: " . $con->connect_error);
	}

	$sql = "UPDATE item SET item_name='$item_name', item_desc='$item_desc', item_price='$item_price' WHERE item_ID='$item_id'";

	$con->query($sql);

	$con->close();

	header("Location: yourproduct.html"); exit();
?>