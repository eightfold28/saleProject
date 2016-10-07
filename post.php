<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "wbd";

	$item_name = (isset($_POST['item_name']) ? $_POST['item_name'] : '');
	$item_desc = (isset($_POST['item_desc']) ? $_POST['item_desc'] : '');
	$item_price = (isset($_POST['item_price']) ? $_POST['item_price'] : '');
	$item_image = $_FILES["item_image"]["name"]; 

	//Get the content of the image and then add slashes to it 
	$imagetmp = addslashes (file_get_contents($_FILES['item_image']['tmp_name']));

	$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($con->connect_error) {
		die("connection failed: " . $con->connect_error);
	}

	$sql = "INSERT INTO item (item_name, item_desc, item_price, item_image) VALUES ('$item_name', '$item_desc', '$item_price', '$item_image')";

	if ($con->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
	}

	$con->close();
?>