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
		$active_ID=$_GET['active_ID'];
	?>

	<div class="navigation_bar">
		<ul>
			<li><a class="active" href= <?php echo 'catalog.php?active_ID=' . $active_ID?> >Catalog</a></li>
			<li><a href= <?php echo 'yourproduct.html?active_ID=' . $active_ID ?> >Your Products</a></li>
			<li><a href= <?php echo 'addproduct.html?active_ID=' . $active_ID ?> >Add Product</a></li>
			<li><a href= <?php echo 'sales.php?active_ID=' . $active_ID?> >Sales</a></li>
			<li><a href= <?php echo 'purchases.php?active_ID=' . $active_ID ?> >Purchases</a></li>
		</ul>
	</div>

	<div class="submenu_header">
		<br>
		What are you going to buy today?
		<hr>
	</div>

	<div class="search_bar">
		<form action= <?php echo 'catalog.php?active_ID=' . $active_ID?> method="post" >
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

			if(empty($_POST['search_catalog'])) {
				$sql = "SELECT item_ID, item_name, item_desc, FORMAT(item_price, 0) item_price, item_purchases, item_image, item_owner, DATE_FORMAT(date_added, '%W, %e %M %Y') dateadd, DATE_FORMAT(date_added, '%H.%i') time_added, isDeleted FROM item WHERE isDeleted = 0 ORDER BY date_added DESC";
			}
			else {
				$search = $_POST['search_catalog'];
				if (strcmp($_POST['search_method'], "product") == 0) {
					$sql = "SELECT item_ID, item_name, item_desc, FORMAT(item_price, 0) item_price, item_purchases, item_image, item_owner, DATE_FORMAT(date_added, '%W, %e %M %Y') dateadd, DATE_FORMAT(date_added, '%H.%i') time_added, isDeleted FROM item WHERE (isDeleted = 0)
					AND (item_name LIKE '%$search%')";
				}
				else
				if(strcmp($_POST['search_method'], "store") == 0) {
					$sql = "SELECT item_ID, item_name, item_desc, FORMAT(item_price, 0) item_price, item_purchases, item_image, item_owner, DATE_FORMAT(date_added, '%W, %e %M %Y') dateadd, DATE_FORMAT(date_added, '%H.%i') time_added, isDeleted, Username FROM item, user WHERE (item.isDeleted = 0) AND (item.item_owner = user.active_ID)
					AND (user.Username LIKE '%$search%')";
				}
			}

			$result = $conn->query($sql);

			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					//ITEM OWNER
					$activeid = $row['item_owner'];
					$owner_temp = mysqli_query($con, "SELECT Username FROM user WHERE active_ID='$activeid'");
					$owner = $owner_temp->fetch_assoc();
					$item_owner = $owner['Username'];
					echo '<br> <div class="owner">' . $item_owner . "</div>";
					echo "added this on " . $row['dateadd'] . ", on " .$row['time_added'];
					echo "<hr> <br>";

		
					//ITEM IMAGE
					echo '<img src ="data:image/jpeg;base64,' . base64_encode($row['item_image']) . '"/> <br>';


					//ITEM NAME
					echo '<div class="name">' . $row['item_name'] . "</div>";


					//ITEM PRICE
					echo '<div class="price"> IDR ' . $row['item_price'] . '</div>';
					

					//LIKE PURCHASE COUNT
					$item_number = $row['item_ID'];
					$like_sql = "SELECT COUNT(active_ID) AS like_count FROM likes WHERE item_ID = $item_number ";
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
						<a href=confirmation.php?active_ID=' . $active_ID . '&item_num=' . $row['item_ID'] . '> BUY </a>
					</div>';
					
					//LIKE BUTTON
					$item_id = $row['item_ID'];
					$statlike = "SELECT * FROM likes where active_ID = '$active_ID' AND item_ID = '$item_id'";
					$resultlike = $conn->query($statlike);
					if($resultlike->num_rows > 0) {
						echo '<div class="likebutton" id= "'.$item_id .'" ><a href="#" return onclick="unlikecount('.$item_id.', '.$active_ID.');return false;"">LIKED</a></div>';
					} else {
						echo '<div class="likebutton" id= "'.$item_id .'" ><a href="#" return onclick="likecount('.$item_id.', '.$active_ID.');return false;"">LIKE</a></div>';
					}

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
<script type="text/javascript" src="ceklike.js"></script>
</html>