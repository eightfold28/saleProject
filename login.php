<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tubeswbd1";

	$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($con->connect_error) {
		die("connection failed: " . $con->connect_error);
	}
	session_start();
	if ($_GET["EmailOrUsername"] || $_GET["Password"]) {
		$username = $_GET["EmailOrUsername"];
		$password = $_GET["Password"];

		$res1 = mysqli_query($con, "SELECT Username, Password FROM User WHERE
			Username = '$username' AND Password = '$password'");

        if(mysqli_num_rows($res1) > 0 ) { 
            $_SESSION["IsLoggedIn"] = true; 
            $_SESSION["name"] = $username; 
            echo 'bisa';
        }
        else {
            echo 'The username or password are incorrect!';
        }
	}

	$con->close();
?>