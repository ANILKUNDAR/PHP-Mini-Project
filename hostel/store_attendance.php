<?php
	require_once 'includes/config.php';
	
	$data = json_decode($_POST['attendance1']);
	$data1 = json_decode($_POST['attendance2']);
	$date = $_POST['select_date'];
	$staff = $_POST['staff1'];
	$result0=0;
	$result1=0;
	
	foreach($data as $d){
		$a="present";
		
		$result0=$conn->query("INSERT INTO `attendance` (date1, student_name,staff_id,value) VALUES('$date','$d','$staff','$a')") or die(mysqli_error());
		if($result0>0)
		{
			
				$result0=1;
		}
	}
	foreach($data1 as $d1){
	$b="absent";
		$result1=$conn->query("INSERT INTO `attendance` (date1, student_name,staff_id,value) VALUES('$date','$d1','$staff','$b')") or die(mysqli_error());
		if($result1>1)
		{
			
				$result1=1;
		}
		
	}
	if(($result0==1) && ($result1==1))
	{
		echo json_encode("success");
	}else{
		echo json_encode("fail");
	}
	?>