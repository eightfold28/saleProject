<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tubeswbd1";

	$active_ID = $_GET['active_ID'];

	$item_name = (isset($_POST['item_name']) ? $_POST['item_name'] : '');
	$item_desc = (isset($_POST['item_desc']) ? $_POST['item_desc'] : '');
	$item_price = (isset($_POST['item_price']) ? $_POST['item_price'] : '');
	$item_image = $_FILES['item_image']['name']; 

	//Get the content of the image and then add slashes to it 
	$imagetmp = addslashes (file_get_contents($_FILES['item_image']['tmp_name']));

	$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($con->connect_error) {
		die("connection failed: " . $con->connect_error);
	}

	$active_ID=$_GET['active_ID'];

	$sql = "INSERT INTO item (item_name, item_desc, item_price, item_image, item_owner) VALUES ('$item_name', '$item_desc', '$item_price', '$imagetmp', '$active_ID')";

	$con->query($sql);

	$con->close();

	header("Location: yourproduct.html?active_ID=$active_ID"); exit();
?>