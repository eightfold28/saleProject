<!DOCTYPE html>
<html lang= "en-US">
<head>

<style type=“text/css”>
</style>
<link rel="stylesheet" href="login.css" type="text/css">
<script type="text/javascript" src="ceklogin.js"></script>
</head>

<body>
<h1> Sale<span class = "projectcolor">Project </span> </h1>
<br> <br>

<h2> Please login </h2>
<hr>

<?php
	error_reporting(0);
	if($_GET["error"] == 1) {
		echo "<h3>Username atau password anda salah. Coba lagi.</h3>";
	}
?>

<form name= "LoginForm" action= "login.php" onsubmit= "return validasiFormKosong()" method= "post">
    Email or Username <br>
    <input type= "text" name= "EmailOrUsername" size= "60" value=""> <br> 
    Password <br>
    <input type ="password" name= "Password" size= "60" value="">
    <br>
    <input type="submit" value="LOGIN" style="float: right;">
</form>

<h3> Don't have an account yet? Register <a href="register.html"> here </h3>

</body>
</html>