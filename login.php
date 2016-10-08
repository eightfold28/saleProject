<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tubeswbd1";

	$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($con->connect_error) {
		die("connection failed: " . $con->connect_error);
	}

	$username = $_POST["EmailOrUsername"];
	$password = $_POST["Password"];
	
	$sql = "SELECT active_ID FROM user WHERE Username = '$username' OR Email = '$username' and Password = '$password'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	while ($row = mysqli_fetch_array($result)) {
		$activeid = $row['active_ID'];
	}

	if ($count == 1) {
		header("Location: catalog.php?active_ID=$activeid");
	} else {
		echo "fail!";
		header('Location: index.php?error=1');
		die();
	}
?>