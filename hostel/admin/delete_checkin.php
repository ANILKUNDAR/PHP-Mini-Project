<?php
require_once 'includes/config.php';
	 $conn->query("DELETE FROM `checkinout` WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
	 header("location: viewcheckinout.php");