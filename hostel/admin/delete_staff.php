<?php
require_once 'includes/config.php';
	 $conn->query("DELETE FROM `staff` WHERE `staff_id` = '$_REQUEST[staff_id]'") or die(mysqli_error());
	 header("location: viewstaff.php");