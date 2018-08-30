<?php
require_once 'includes/config.php';
$a=$_REQUEST[result_id];




$conn->query("DELETE FROM `result` WHERE `result_id` = '$a'") or die(mysqli_error());
header("location: viewresult.php");