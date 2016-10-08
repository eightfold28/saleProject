<!DOCTYPE html>
<html lang= "en-US">

<head>
    <meta charset= "utf-8">
    <title>SaleProject</title>
    <link rel="stylesheet" href="SaleProjectStyle.css" type="text/css">
</head>
<body>
    <div class= "title">
        <br>
        Sale<span style= "color: #4887E4">Project</span>
        <br>
    </div>

    <?php include("userlogin.php"); ?>

    <div class="navigation_bar">
			<ul>
				<li><a href="catalog.php?active_ID=<?php echo $activeid; ?>">Catalog</a></li>
				<li><a href="yourproduct.html?active_ID=<?php echo $activeid; ?>">Your Product</a></li>
				<li><a href="addproduct.html?active_ID=<?php echo $activeid; ?>">Add Product</a></li>
				<li><a class="active" href="sales.php?active_ID=<?php echo $activeid; ?>">Sales</a></li>
				<li><a href="purchases.php?active_ID=<?php echo $activeid; ?>">Purchases</a></li>
			</ul>
		</div>

    <div class="submenu_header">
        <br>
        Here are your sales
        <hr>
    </div>
    <br>
    <?php
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "tubeswbd1";

        $con = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        $active_ID=$_GET['active_ID'];
        $owner_temp = mysqli_query($con, "SELECT FullName FROM user WHERE active_ID='$active_ID'");
        $row = $owner_temp->fetch_assoc();
        $item_owner = $row['FullName'];


        $sql = "SELECT item.item_ID, purchase.item_ID, item_owner, DATE_FORMAT(order_date, '%W, %e %M %Y') dateorder, DATE_FORMAT(order_date, '%H.%i') timeorder, item_name, item_image, item_price, FORMAT(item_price, 0) itemprice, quantity, cust_ID, deliv_name, deliv_address,
            deliv_phone FROM purchase, item WHERE purchase.item_ID = item.item_ID and item_owner = '$item_owner'";
        $result = mysqli_query($con, $sql); 
        
        while ($row = mysqli_fetch_array($result)) { ?>
            <div class= "sales_history">
                <br>
                <?php echo $row['dateorder']; ?>
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
                        bought by <span class= "boldfont"><?php echo $row['cust_ID']; ?>
                    </span>
                    <br> </span>
                 </p>
        <?php }?>

</body>
</html>