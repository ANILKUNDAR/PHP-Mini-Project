<?php
require_once 'includes/config.php';
$a=$_REQUEST[g_id];


//$conn->query("DELETE FROM `gallary` WHERE `g_id` = '$a' ") or die(mysqli_error());
header("location: staffgallery.php");