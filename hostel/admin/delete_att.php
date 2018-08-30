<?php
require_once 'includes/config.php';
$a=$_REQUEST[id];

$k=$c+1;



$conn->query("DELETE FROM `attendance` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
header("location: viewattendance.php");