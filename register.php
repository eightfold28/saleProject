<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tubeswbd1";

	$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($con->connect_error) {
		die("connection failed: " . $con->connect_error);
	}

	$FullName = (isset($_POST['fullname']) ? $_POST['fullname'] : '');
	$Username = (isset($_POST['username']) ? $_POST['username'] : '');
	$Email = (isset($_POST['email']) ? $_POST['email'] : '');
	$Password = (isset($_POST['password']) ? $_POST['password'] : '');
	$FullAddress = (isset($_POST['fulladdress']) ? $_POST['fulladdress'] : '');
	$PostalCode = (isset($_POST['postalcode']) ? $_POST['postalcode'] : '');
	$PhoneNumber = (isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '');

	$sql = "INSERT INTO User (FullName, Username, Email, Password, FullAddress, PostalCode, PhoneNumber) VALUES ('$FullName', '$Username', '$Email', '$Password', '$FullAddress', '$PostalCode', '$PhoneNumber')";

	if ($con->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
	}

	$con->close();
?>