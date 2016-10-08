<html>

<head>
	<meta charset="utf-8">

	<title>SaleProject - Confirmation Purchase</title>
	
	<link rel="stylesheet" type="text/css" href="SaleProjectStyle.css">
</head>

<body>
	<div class="title">
		<br>
		Sale<span style="color: #4887E4">Project</span> <br>
	</div>

	<?php
		include 'userlogin.php';
	?>

	<div class="navigation_bar">
		<ul>
			<li><a href= <?php echo 'catalog.php?active_ID=' . $activeid?> >Catalog</a></li>
			<li><a href="">Your Products</a></li>
			<li><a href="">Add Product</a></li>
			<li><a href="">Sales</a></li>
			<li><a href= <?php echo 'purchases.php?active_ID=' . $activeid ?> >Purchases</a></li>
		</ul>
	</div>

	<div class="submenu_header">
		<br>
		Please confirm your purchase
		<hr>
	</div>

	<?php
		//Take item_num variable from catalog.php
		$item_id = $_GET['item_num'];

		//Take user_id with GET
		$user = $_GET['active_ID'];

		//Connect to database to take item detail
		$servername = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "tubeswbd1";

		$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

		if($conn->connect_error) {
			die("Connection failed : " . $conn->connect_error);
		}

		$item_sql = "SELECT * FROM item WHERE isDeleted = 0 AND item_ID = '$item_id'";
		$item_result = $conn->query($item_sql);
		$item_detail = $item_result->fetch_assoc();

		//Take user detail
		$user_sql = "SELECT * FROM user WHERE active_ID = '$user'";
		$user_result = $conn->query($user_sql);
		$user_detail = $user_result->fetch_assoc();
	?>

	<form action="buy_success.php" method="post">
	<div class="confirmation_purchase">
		Product : <?php
			echo $item_detail['item_name'];
		?> <br>
		Price 	: <?php
			echo $item_detail['item_price'];
		?> <br>
		Quantity : <input type="text" name="qty" placeholder="1" style="width: 30px;"> pcs <br>
		Total Price : <br>
		Delivery to : <br>
		<br>
	</div>

	
		<div class="confirmation_purchase_form">
			<small>Consignee</small> <br>
			<input type="text" name="consignee" value= <?php echo '"' . $user_detail['FullName'] . '"'?> > <br> <br>
			<small>Full Address</small> <br>
			<textarea name="full_address" cols="130" rows="2"> <?php echo $user_detail['FullAddress']?></textarea> <br> <br>
			<small>Postal Code</small> <br>
			<input type="text" name="postal_code" value= <?php echo '"' . $user_detail['PostalCode'] . '"'?> > <br> <br>
			<small>Phone Number</small> <br>
			<input type="text" name="phone_number" value= <?php echo '"' . $user_detail['PhoneNumber'] . '"'?> > <br> <br>
			<small>12 Digits Credit Card Number</small> <br>
			<input type="text" name="credit_card"> <br> <br>
			<small>3 Digits Card Verification Value</small> <br>
			<input type="text" name="card_verification"> <br> <br> <br>

			<input type="text" name="itemid" hidden="" value= <?php
			echo $item_detail['item_ID'];?> >
			<input type="text" name="userid" hidden="" value= <?php
			echo $user?> >

			<input type="submit" name="cancel" value="CANCEL" onclick="location.href=' <?php echo 'catalog.php?active_ID=' . $activeid?> '">
			<input type="submit" name="confirm_purchse" value="CONFIRM" style="margin-right: 30px;"> <br> <br>
		</div>
	</form>

</body>

</html>