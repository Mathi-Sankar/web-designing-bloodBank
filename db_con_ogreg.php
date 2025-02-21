<?php
$sname= "localhost";
$unmae= "root";
$db_name = "bs_new";
$conn = mysqli_connect($sname,$unmae,"",$db_name);
if (!$conn) {
    echo "Connection failed!";
}
?>