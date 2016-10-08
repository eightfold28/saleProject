<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tubeswbd1";

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
	$date = date("Y-m-d") . time("h:i:s");

	$sql_item = "UPDATE item_purchases SET item_purchases = item_purchases + 1 WHERE item_id = '$item_id'";

	$sql_purchase = "INSERT INTO purchase (item_ID, cust_ID, deliv_name, deliv_address, deliv_postalcode, deliv_phone, quantity, order_date) VALUES ('$item_id', '$cust', '$delivname', '$delivadd', '$delivpostalcode', '$delivphone', '$qty', '$date');
?>