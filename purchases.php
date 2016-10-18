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
	        $servername = "localhost";
	        $dbusername = "root";
	        $dbpassword = "";
	        $dbname = "tubeswbd1";

	        $con = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	        $active_ID=$_GET['active_ID'];


	        $sql = "SELECT item.item_ID, purchase.item_ID, item_owner, DATE_FORMAT(order_date, '%W, %e %M %Y') dateorder, DATE_FORMAT(order_date, '%H.%i') timeorder, item_name, item_image, item_price, FORMAT(item_price, 0) itemprice, quantity, cust_ID, deliv_name, deliv_address,
	            deliv_phone FROM purchase, item WHERE purchase.item_ID = item.item_ID and cust_ID = '$active_ID'";
	        $result = mysqli_query($con, $sql); 
	        
	        while ($row = mysqli_fetch_array($result)) { 
	        	$activeid = $row['item_owner'];
				$owner_temp = mysqli_query($con, "SELECT Username FROM user WHERE active_ID='$activeid'");
				$owner = $owner_temp->fetch_assoc();
				$item_owner = $owner['Username'];
	        	?>
	            <div class= "sales_history">
	                <br><b>
	                <?php echo $row['dateorder']; ?></b>
	                <br>
	                <?php echo $row['timeorder']; ?>
	                <hr>
	                <?php echo '<img src="data:image/jpg;base64, '.base64_encode($row['item_image']). '"/>' ?>
	                <p>
	                    <span class= "itemname"><?php echo $row['item_name']; ?></span>
	                    <span class= "order-detail">Delivery to <span class= "boldfont"><?php echo $row['deliv_name']; ?></span></span>
	                    <br>
	                    IDR <?php $totalharga = $row['item_price'] * $row['quantity'];
	                    $total = number_format($totalharga);
	                    echo $total; ?>
	                    <span class= "order-detail"><?php echo $row['deliv_address']; ?></span>
	                    <br>
	                    <?php echo $row['quantity']; ?> pcs
	                    <span class= "order-detail">Bandung</span>
	                    <br>
	                    @IDR <?php echo $row['itemprice']; ?>
	                    <span class= "order-detail">40280
	                        <br>
	                        <?php echo $row['deliv_phone']; ?>
	                        <br>
	                        bought from <span class= "boldfont"><?php echo $item_owner; ?>
	                    </span>
	                    <br> </span>
	                 </p>
	                 <br><br><br><br>
	        <?php }?>
	</div>
</body>
</html>