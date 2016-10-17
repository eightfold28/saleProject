<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tubeswbd1";

	$active_ID = $_GET['active_ID'];

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	if($conn->connect_error) {
		die("Connection failed : " . $conn->connect_error);
	}

	$item_id = $_POST['itemid'];
	$cust = $_POST['userid'];
	$delivname = $_POST['consignee'];
	$delivadd = $_POST['full_address'];
	$delivpostalcode = $_POST['postal_code'];
	$delivphone = $_POST['phone_number'];
	$qty = $_POST['qty'];

	$sql_item = "UPDATE item SET item_purchases = item_purchases + 1 WHERE item_id = '$item_id'";
	$conn->query($sql_item);

	$sql_purchase = "INSERT INTO purchase (item_ID, cust_ID, deliv_name, deliv_address, deliv_postalcode, deliv_phone, quantity) VALUES ('$item_id', '$cust', '$delivname', '$delivadd', '$delivpostalcode', '$delivphone', '$qty')";
	$conn->query($sql_purchase);

	$conn->close();

	header("Location: purchases.php?active_ID=$active_ID"); exit();
?>