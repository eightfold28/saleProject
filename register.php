<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tubeswbd1";

	$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($con->connect_error) {
		die("connection failed: " . $con->connect_error);
	}

	/* cek apa form sudah diisi, jika tidak maka defaultnya kosong */
	// $FullName = (isset($_POST['fullname']) ? $_POST['fullname'] : '');
	// $Username = (isset($_POST['username']) ? $_POST['username'] : '');
	// $Email = (isset($_POST['email']) ? $_POST['email'] : '');
	// $Password = (isset($_POST['password']) ? $_POST['password'] : '');
	// $FullAddress = (isset($_POST['fulladdress']) ? $_POST['fulladdress'] : '');
	// $PostalCode = (isset($_POST['postalcode']) ? $_POST['postalcode'] : '');
	// $PhoneNumber = (isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '');

	$FullName = $_POST['fullname'];
	$Username = $_POST['username'];
	$Email = $_POST['email'];
	$Password = $_POST['password'];
	$FullAddress = $_POST['fulladdress'];
	$PostalCode = $_POST['postalcode'];
	$PhoneNumber = $_POST['phonenumber'];

	$sqluser=mysqli_query($con, "SELECT Username FROM user WHERE Username='$Username'");
	$sqlemail=mysqli_query($con, "SELECT Email FROM user WHERE Email='$Email'");

	//Jika username dan email belum ada di db user maka insert
	if ((mysqli_num_rows($sqluser)==0) && mysqli_num_rows($sqlemail)==0) {
		$sql = "INSERT INTO User (FullName, Username, Email, Password, FullAddress, PostalCode, 
			PhoneNumber) VALUES ('$FullName', '$Username', '$Email', '$Password', 
			'$FullAddress', '$PostalCode', '$PhoneNumber')";
	}
	else { //direct ke register.html lagi
		header("Location: register.html?error=2");
	}

	$sql1 = "SELECT active_ID FROM user WHERE Username = '$Username' and Password = '$Password'";
	$result1 = mysqli_query($con, $sql1);
	while ($row = mysqli_fetch_array($result1)) {
		$activeid = $row['active_ID'];
	}

	if ($con->query($sql) === TRUE) {
	    header("Location: catalog.php?active_ID=$activeid");
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
	}

	$con->close();
?>