<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

//echo "update cav_user set current_mac='$mac' where uname='$user'";
mysqli_query($connect,"update cav_user set current_mac='$mac' where uname='$user'");


?>