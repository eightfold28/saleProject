<?php
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "tubeswbd1";

        $con = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        $active_ID=$_GET['active_ID'];
        $item_ID=$_GET['item_ID'];

        $sql = "INSERT INTO likes VALUES ('$active_ID', '$item_ID')";
        $result = mysqli_query($con, $sql); 

?>