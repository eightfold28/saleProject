<html>

<head>
	<meta charset="utf-8">

	<title>SaleProject - Catalog</title>
	
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
			<li><a class="active" href= <?php echo 'catalog.php?active_ID=' . $activeid?> >Catalog</a></li>
			<li><a href= <?php echo 'yourproduct.html?active_ID=' . $activeid ?> >Your Products</a></li>
			<li><a href= <?php echo 'addproduct.html?active_ID=' . $activeid ?> >Add Product</a></li>
			<li><a href= <?php echo 'sales.php?active_ID=' . $activeid?> >Sales</a></li>
			<li><a href= <?php echo 'purchases.php?active_ID=' . $activeid ?> >Purchases</a></li>
		</ul>
	</div>

	<div class="submenu_header">
		<br>
		What are you going to buy today?
		<hr>
	</div>

	<div class="search_bar">
		<form action= <?php echo 'catalog.php?active_ID=' . $activeid?> method="post" >
			<input type="text" name="search_catalog" placeholder="Search catalog ...">
			<input type="submit" value="GO">
			<br> <br>
			by
			<input type="radio" name="search_method" value="product" checked style="margin-left: 50px"> product <br>
			<input type="radio" name="search_method" value="store" style="margin-left: 73px"> store
		</form>
	</div>

	<div class="catalog_item">
		<?php
			$servername = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "tubeswbd1";

			$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

			if($conn->connect_error) {
				die("Connection failed : " . $conn->connect_error);
			}

			//Checking search bar has been used or not
			if(empty($_POST['search_catalog'])) {
				$sql = "SELECT * FROM item WHERE isDeleted = 0 ORDER BY date_added DESC";
			}
			else {
				if($_POST['search_method'] == 'product') {
					$sql = "SELECT * FROM item WHERE isDeleted = 0
					AND INSTR(item_name,'" . mysql_escape_string($_POST['search_catalog'])."')
					ORDER BY date_added DESC";
				}
				else
				if($_POST['search_method'] == 'store') {
					$sql = "SELECT * FROM item WHERE isDeleted = 0
					AND INSTR(item_owner,'" . mysql_escape_string($_POST['search_catalog'])."')
					ORDER BY date_added DESC";
				}
			}

			$result = $conn->query($sql);

			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					//ITEM OWNER
					echo '<br> <div class="owner">' . $row['item_owner'] . "</div>";
					echo "added this on " . $row['date_added'];
					echo "<hr> <br>";

		
					//ITEM IMAGE
					echo '<img src ="data:image/jpeg;base64,' . base64_encode($row['item_image']) . '"/> <br>';


					//ITEM NAME
					echo '<div class="name">' . $row['item_name'] . "</div>";


					//ITEM PRICE
					echo '<div class="price"> IDR ' . $row['item_price'] . '</div>';
					

					//LIKE PURCHASE COUNT
					$item_number = $row['item_ID'];
					$like_sql = "SELECT COUNT(user_ID) AS like_count FROM likes WHERE item_ID = $item_number ";
					$like_result = $conn->query($like_sql);
					$like = $like_result->fetch_assoc();
					echo '<div class="count">' . $like['like_count'] . ' likes <br>';
					
					$purchase_sql = "SELECT SUM(quantity) AS purchase_count FROM purchase WHERE item_ID = $item_number";
					$purchase_result = $conn->query($purchase_sql);
					$purchase = $purchase_result->fetch_assoc();
					if($purchase['purchase_count'] == 0) {
						echo '0 purchases';
					}
					else {
						echo $purchase['purchase_count'] . ' purchases';
					}
					echo '</div>';


					//ITEM DETAIL
					echo '<div class="detail">' . $row['item_desc'] . '</div>';


					//LIKE BUY BUTTON
					echo '<br>
					<div class="buybutton">
						<a href=confirmation.php?active_ID=' . $activeid . '&item_num=' . $row['item_ID'] . '> BUY </a>
					</div>';
					
					echo '<div class="likebutton">LIKE</div>';
					

					//CLEARFIX FLOAT
					echo '<div class="clearfix"></div>';

					echo "<br><hr><br><br>";
				}
			}
			else {
				echo "0 results";
			}

			$conn->close();
		?>
	</div>
	
</body>

</html>