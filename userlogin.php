<link rel="stylesheet" href="sales.css" type="text/css">

<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tubeswbd1";

	$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($con->connect_error) {
		die("connection failed: " . $con->connect_error);
	}
	$activeid = $_GET['active_ID'];

	$sql = "SELECT Username FROM user WHERE active_ID = '$activeid' ";
	$result = mysqli_query($con, $sql);
	while ( $row = mysqli_fetch_array($result)) { ?>
		<?php $username = $row['Username']; ?>
		<div class= "user_greet">
        <br>
        Hi, <?php echo $row['Username']; ?>! <br>
        <a href= "logout.php">logout</a>
        <br>
   		</div>
	<?php }?>