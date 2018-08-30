<?php
require_once 'includes/config.php';
$a=$_REQUEST[event];




$conn->query("DELETE FROM `event` WHERE `id` = '$a'") or die(mysqli_error());
header("location: viewevent.php");