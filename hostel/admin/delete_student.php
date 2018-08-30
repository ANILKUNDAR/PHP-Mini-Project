<?php
require_once 'includes/config.php';
$a=$_REQUEST[student_id];
$b=$_REQUEST[room_id];
$c=$_REQUEST[room_quantity];
$k=$c+1;


$conn->query("UPDATE room SET room_quantity='$k' WHERE room_number='$b'");
$conn->query("DELETE FROM `student` WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
header("location: viewstudent.php");