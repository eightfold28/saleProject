<html>

<head>
	<meta charset="utf-8">

	<title>SaleProject - Purchases</title>
	
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
			<li><a href= <?php echo 'yourproduct.html?active_ID=' . $activeid ?> >Your Products</a></li>
			<li><a href= <?php echo 'addproduct.html?active_ID=' . $activeid ?> >Add Product</a></li>
			<li><a href= <?php echo 'sales.php?active_ID=' . $activeid?> >Sales</a></li>
			<li><a class="active" href= <?php echo 'purchases.php?active_ID=' . $activeid ?> >Purchases</a></li>
		</ul>
	</div>

	<div class="submenu_header">
		<br>
		Here are your purchases
		<hr>
	</div>

	<div class="catalog_item">
		<?php
			//Take user_id with GET
			$user = $_GET['active_ID'];

			//Connect to database to take purchase history
			$servername = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "tubeswbd1";

			$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

			if($conn->connect_error) {
				die("Connection failed : " . $conn->connect_error);
			}

			$purchase_sql = "SELECT * FROM purchase WHERE cust_ID = '$user'";
			$purchase_result = $conn->query($purchase_sql);
			
			//Take seller detail
			$item_sql = "SELECT * FROM item";
			$item_result = $conn->query($item_sql);
			$item_detail = $item_result->fetch_assoc();
		?>

		<?php
			if($purchase_result->num_rows > 0) {
				while($purchase_detail = $purchase_result->fetch_assoc()) {
					//BUY DATE
					echo "<br> <br>";
					echo $row['date_added'];
					echo "<hr> <br>";


					//ITEM IMAGE
					$img_sql = "SELECT item_image FROM item WHERE item_ID = item_ID";
					$img_result = $conn->query($img_sql);
					$img_detail = $img_result->fetch_assoc();
					echo '<img src ="data:image/jpeg;base64,' . base64_encode($img_detail['item_image']) . '"/> <br>';


					//ITEM NAME
					$name_sql = "SELECT item_name FROM item";
					$name_result = $conn->query($name_sql);
					$name_detail = $name_result->fetch_assoc();
					echo '<div class="name">' . $name_detail['item_name'] . "</div>";


					//ITEM PRICE
					$price_sql = "SELECT item_price FROM item";
					$price_result = $conn->query($price_sql);
					$price_detail = $price_result->fetch_assoc();
					echo '<div class="price"> IDR ' . $price_detail['item_price'] . '</div>';

					//PURCHASE DETAIL
					echo '<div class="count"> Delivery to <b>' . $purchase_detail['deliv_name'] . '</b> <br>';
					echo $purchase_detail['deliv_address'] . '<br>';
					echo $purchase_detail['deliv_postalcode'] . '<br>';
					echo $purchase_detail['deliv_phone'] . '<br>';
					$seller_sql = "SELECT item_owner FROM item";
					$seller_result = $conn->query($seller_sql);
					$seller_detail = $seller_result->fetch_assoc();
					echo 'bought from <b>' . $seller_detail['item_owner'] . '</b> <br> <br>';
				}
			}
			else
			{
				echo "No purchase history";
			}
		?>
	</div>

</body>

</html>