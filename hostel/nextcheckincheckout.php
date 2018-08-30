<?php
	require_once 'includes/config.php';
	
	$data = json_decode($_POST['attendance1']);

	$checkin = $_POST['check_in'];
	$checkout = $_POST['check_out'];
		$staff = $_POST['staff1'];
	$result0=0;
	
	
	foreach($data as $d){
	
		
		$result0=$conn->query("INSERT INTO `checkinout` (fromdate,todate,student_id,staff_id) VALUES('$checkin', '$checkout', '$d','$staff')") or die(mysqli_error());
		if($result0>0)
		{
			
				$result0=1;
		}
	}
	
	if(($result0==1))
	{
		echo json_encode("success");
	}else{
		echo json_encode("fail");
	}
	?>