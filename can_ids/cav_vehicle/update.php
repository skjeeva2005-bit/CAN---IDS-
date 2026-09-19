<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
mysqli_query($connect,"update cav_user set current_mac='$mac' where uname='$user'");


?>