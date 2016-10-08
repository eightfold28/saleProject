<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tubeswbd1";

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
	$owner_temp = mysqli_query($con, "SELECT FullName FROM user WHERE active_ID='$active_ID'");
	$row = $owner_temp->fetch_assoc();
	$item_owner = $row['FullName'];

	$sql = "INSERT INTO item (item_name, item_desc, item_price, item_image, item_owner) VALUES ('$item_name', '$item_desc', '$item_price', '$imagetmp', '$item_owner')";

	$con->query($sql);

	$con->close();

	header("Location: yourproduct.html"); exit();
?>