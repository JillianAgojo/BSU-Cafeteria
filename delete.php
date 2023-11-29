<?php


$del =  $_GET['a'];

include('../includes/connect.php');

$tdl = "delete from menu where food_id = '$del'";
$res =  mysqli_query($con,$tdl);

header("location:viewmenu.php");

?>