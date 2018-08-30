<!DOCTYPE html>
<html lang="en">
    <head>
				
				<!-- Title -->
				<title>HOSTEL|Register</title>
				
				<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
				<meta charset="UTF-8">
				<meta name="description" content="Responsive Admin Dashboard Template" />
				<meta name="keywords" content="admin,dashboard" />
				<meta name="author" content="Steelcoders" />
				
				<!-- Styles -->
				<link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
				<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
				<link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

					
				<!-- Theme Styles -->
				<link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
				<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
				<meta charset="UTF-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
				<meta name="description" content="">
				<meta name="author" content="">
				<meta name="theme-color" content="#3e454c">
				<title>User Registration</title>
				<link rel="stylesheet" href="css2/font-awesome.min.css">
				<link rel="stylesheet" href="css2/bootstrap.min.css">
				<link rel="stylesheet" href="css2/dataTables.bootstrap.min.css">
				<link rel="stylesheet" href="css2/bootstrap-social.css">
				<link rel="stylesheet" href="css2/bootstrap-select.css">
				<link rel="stylesheet" href="css2/fileinput.min.css">
				<link rel="stylesheet" href="css2/awesome-bootstrap-checkbox.css">
				<link rel="stylesheet" href="css2/style.css">
				<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
				<script type="text/javascript" src="js/validation.min.js"></script>
				<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
			<script type="text/javascript">
				function valid()
				{
					var a=document.getElementById("name").value;
					var b=document.getElementById("password").value;
					var d=b.length;
					var e=document.getElementById("contact").value;
					var f=e.length;
					var c=document.getElementById("cpassword").value;
					if ((!isNaN(a)) || (a ==="" )) {
						alert("Please enter correct name");
						document.getElementById("name").focus();
						return false;
					} 
					if((b != c))
					{
					alert("Password and Re-Type Password Field do not match  !!");
					document.getElementById("password").focus();
					return false;
					}
					if((d<8))
					{
					alert("Password lenght must be greater than 8 !!");
					document.getElementById("password").focus();
					return false;
					}
					if((f<10))
					{
					alert("contact no must be correct !!");
					document.getElementById("password").focus();
					return false;
					}
					return true;
					
				
				}
				</script>
			  <style>
								.errorWrap {
							padding: 10px;
							margin: 0 0 20px 0;
							background: #fff;
							border-left: 4px solid #dd3d36;
							-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
							box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
						}
						.succWrap{
							padding: 10px;
							margin: 0 0 20px 0;
							background: #fff;
							border-left: 4px solid #5cb85c;
							-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
							box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
						}
							#btn{
							display :none;
						}
						.img-responsive{
							display : none;
							position : absolute;
							top : 0;
							bottom : 0;
							left:0;
							right : 0;
							margin : auto;
							background  : rgba(255,255,255,0.9);
						}
						.caret{
							display:none !important;
						}
			</style>
				
    </head>
	<?php

		require_once 'includes/config.php';
		if(ISSET($_POST['submit'])){
			$name = $_POST['name'];
		$cast=$_POST['cast'];
		$registerno= $_POST['register'];
		$join = $_POST['join'];
		$branch = $_POST['ab'];
		$email = $_POST['email'];
		$payment=$_POST['payment'];
	
		
	$qu="SELECT * FROM student WHERE register_no='$registerno'  ";
$query=mysqli_query($conn,$qu);
$n0=mysqli_fetch_array($query);
if($n0>0)
{
	echo '<script>window.location.href = "forgot-password.php";';
echo"alert('Register Number is already taken'); ";
echo "</script>";
}else{
		$date1= date('Y-m-d');
		if($payment==2){
				$date= date('Y-m-d', strtotime("+60 days"));
		}elseif($payment==3){
			$date= date('Y-m-d', strtotime("+90 days"));
		}else {
			$date= date('Y-m-d', strtotime("+120 days"));
		}
	
		$contactno= $_POST['contact'];
        $password=$_POST['password'];
        $pending=60000;

	$qu="SELECT * from year";
	$query=mysqli_query($conn,$qu);
					while($year=mysqli_fetch_array($query)){

		
			if($join==$year['year'])
			{ 
				$floor=1;
				if($branch==1)
				{
				$qu="SELECT * FROM room,floor,department WHERE room.floor_id=floor.floor_id and room.department_id=department.department_id AND department.department_id='$branch' AND room.room_quantity>0 ";
					$query=mysqli_query($conn,$qu);
					while($num=mysqli_fetch_array($query)) {	
						if($num[room_number]==101)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=101";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 101;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=101 ;";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error());
									
									$conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									
			?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
					
								}
							
							}
						}
						elseif($num[room_number]==102)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=102";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 102;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=102 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==103)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=103";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 103;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=103 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==104)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=104";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 104;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=104 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==105)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=105";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 105;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=105 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						else{ 
							echo"room not available";
						}
					}
				}elseif($branch==2)
				{
							$qu="SELECT * FROM room,floor,department WHERE room.floor_id=floor.floor_id and room.department_id=department.department_id AND department.department_id='$branch'AND room.room_quantity>0 ";
					$query=mysqli_query($conn,$qu);
					while($num=mysqli_fetch_array($query)) {	
						if($num[room_number]==106)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=106";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 106;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=106 ;";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
					
								}
							
							}
						}
						elseif($num[room_number]==107)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=107";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 107;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=107 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==108)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=108";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 108;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=108";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==109)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=109";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 109;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=4";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==110)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=110";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 110;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=110";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}else{ 
							echo"room not available";
						}
					}
				}else
				{
							$qu="SELECT * FROM room,floor,department WHERE room.floor_id=floor.floor_id and room.department_id=department.department_id AND department.department_id='$branch'AND room.room_quantity>0 ";
					$query=mysqli_query($conn,$qu);
					while($num=mysqli_fetch_array($query)) {	
						if($num[room_number]==111)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=111";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 111;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=111 ;";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
					
								}
							
							}
						}
						elseif($num[room_number]==112)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=112";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 112;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=112 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==113)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=113";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 113;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=113";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==114)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=114";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 114;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=114";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
						
							}
						}
						elseif($num[room_number]==115)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=115";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 115;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=115";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}else{ 
							echo"room not available";
						}
					}
				}
			}
			elseif($join==$year['year'])
			{  
				$floor=2;
				if($branch==1)
				{
				$qu="SELECT * FROM room,floor,department WHERE room.floor_id=floor.floor_id and room.department_id=department.department_id AND department.department_id='$branch' AND room.room_quantity>0 ";
					$query=mysqli_query($conn,$qu);
					while($num=mysqli_fetch_array($query)) {	
						if($num[room_number]==201)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=201";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 201;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=201 ;";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
					
								}
							
							}
						}
						elseif($num[room_number]==202)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=202";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 202;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=202 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==203)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=203";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 203;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=203 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==204)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=204";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 204;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=204";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==205)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=205";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 205;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=205";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}else{ 
							echo"room not available";
						}
					}
				}elseif($branch==2)
				{
							$qu="SELECT * FROM room,floor,department WHERE room.floor_id=floor.floor_id and room.department_id=department.department_id AND department.department_id='$branch'AND room.room_quantity>0 ";
					$query=mysqli_query($conn,$qu);
					while($num=mysqli_fetch_array($query)) {	
						if($num[room_number]==206)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=206";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 206;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=206 ;";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
					
								}
							
							}
						}
						elseif($num[room_number]==207)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=207";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 207;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=207 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==208)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=208";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 208;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=208";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==209)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=209";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 209;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=209";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==210)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=210";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 210;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=210";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}else{ 
							echo"room not available";
						}
					}
				}else
				{
							$qu="SELECT * FROM room,floor,department WHERE room.floor_id=floor.floor_id and room.department_id=department.department_id AND department.department_id='$branch'AND room.room_quantity>0 ";
					$query=mysqli_query($conn,$qu);
					while($num=mysqli_fetch_array($query)) {	
						if($num[room_number]==211)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=211";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 212;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=212 ;";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
					
								}
							
							}
						}
						elseif($num[room_number]==212)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=212";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 212;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=212";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==213)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=213";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 213;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=213";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==214)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=214";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 214;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=214";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==215)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=215";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 215;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=215";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						else{ 
							echo"room not available";
						}
					}
				}
			
				
			}else{

				$floor=3;
				if($branch==1)
				{
				$qu="SELECT * FROM room,floor,department WHERE room.floor_id=floor.floor_id and room.department_id=department.department_id AND department.department_id='$branch' AND room.room_quantity>0 ";
					$query=mysqli_query($conn,$qu);
					while($num=mysqli_fetch_array($query)) {	
						if($num[room_number]==301)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=301";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 301;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=301 ;";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
					
								}
							
							}
						}
						elseif($num[room_number]==302)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=302";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 302;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=302 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==303)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=303";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 303;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=303 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==304)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=304";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 304;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=304 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==305)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=305";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 305;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=305";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}else{ 
							echo"room not available";
						}
					}
				}elseif($branch==2)
				{
							$qu="SELECT * FROM room,floor,department WHERE room.floor_id=floor.floor_id and room.department_id=department.department_id AND department.department_id='$branch'AND room.room_quantity>0 ";
					$query=mysqli_query($conn,$qu);
					while($num=mysqli_fetch_array($query)) {	
						if($num[room_number]==306)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=306";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 306;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=306 ;";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
					
								}
							
							}
						}
						elseif($num[room_number]==307)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=307";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 307;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=307 ";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==306)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=306";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 306;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=306";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==307)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=307";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 307;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=307";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==308)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=308";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 308;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=308";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==309)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=309";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 309;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=309";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==310)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=310";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 310;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=310";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						else{ 
							echo"room not available";
						}
					}
				}else
				{
							$qu="SELECT * FROM room,floor,department WHERE room.floor_id=floor.floor_id and room.department_id=department.department_id AND department.department_id='$branch'AND room.room_quantity>0 ";
					$query=mysqli_query($conn,$qu);
					while($num=mysqli_fetch_array($query)) {	
						if($num[room_number]==311)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=311";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 311;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=311 ;";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
					
								}
							
							}
						}
						elseif($num[room_number]==312)
						{
						
							$qu="SELECT room_quantity FROM room WHERE room_number=312";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 312;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=312";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==313)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=313";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 313;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=313";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==314)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=314";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 314;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=314";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						elseif($num[room_number]==315)
						{
							$qu="SELECT room_quantity FROM room WHERE room_number=315";
							$query=mysqli_query($conn,$qu);
							while($quantity=mysqli_fetch_array($query)) {
								$a=$num[room_quantity]-1;
								$conn->query("UPDATE room SET room_quantity = '$a' WHERE room_number = 315;") or die(mysqli_error());
								$qu="SELECT room_id FROM room WHERE room_number=315";
								$query=mysqli_query($conn,$qu);
								while($num=mysqli_fetch_array($query)) {
									
									
									$conn->query("INSERT INTO `student` (student_name,cast,register_no,yearofjoin,branch,email,contactno,password,room_number,payment_option) VALUES('$name','$cast','$registerno','$join ','$branch','$email','$contactno','$password','$num[room_id]',$payment)") or die(mysqli_error()); $conn->query("INSERT INTO `payment_original` (payment_type,email,pending,date,expiredate) VALUES('$payment','$email','$pending','$date1','$date')") or die(mysqli_error());
									?>	<button class="btn btn-primary" id = "btn" onclick = "run();">Submit</button><?php
						
								}
							
							}
						}
						else{ 
							echo"room not available";
						}
					}
				}
			
					
			
				 }	
				
			}
}
		}

		
?>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">      
                            <span class="chapter-title">HOSTEL</span>
                        </div>
                      
                           
                        </form>
                     
                        
                    </div>
                </nav>
            </header>
           
           
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                   
                  
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" style="">
                    <li>&nbsp;</li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="index.php"><i class="material-icons">account_box</i>Student Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="forgot-password.php"><i class="material-icons">account_box</i>Student Register</a></li>
                
                       <li class="no-padding"><a class="waves-effect waves-grey" href="admin/"><i class="material-icons">account_box</i>Admin Login</a></li>
                  <li class="no-padding"><a class="waves-effect waves-grey" href="stafflogin.php"><i class="material-icons">account_box</i>Staff Login</a></li>
				  <li class="no-padding"> <a class="waves-effect waves-grey"  href="out.php"><i class="material-icons">exit_to_app</i>Sign Out</a></li>
              
                </ul>
          <div class="footer">
                    
                
                </div>
                </div>
            </aside>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                       
				<div class="row">
					<div class="col-md-12">
					
						<h4 class="page-title" >Student Registration </h4>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
			<form method="post" action=""  name="registration" class="form-horizontal" onSubmit="return valid();">
											
										




			<div class="form-group">
					<label class="col-sm-2 control-label"  style="text-align:left;"> Name : </label>
					<div class="col-sm-8">
					<input type="text" name="name" id="name"  class="form-control" >
					</div>
			</div>
			<div class="form-group">
					 <label class="col-sm-2 control-label" style="text-align:left;">Cast: </label>
					 <div class="col-sm-8">
					 <select style="none;"name="cast">
				
							<option value="Catholic">Catholic</option>
							<option value="Non Catholic">Non Catholic</option>
					</select>
					</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label" style="text-align:left;">College Register Number: </label>
				<div class="col-sm-8">
				<input type="text" name="register" id="register"  class="form-control">
				</div>
			</div>
			<div class="form-group">
					 <label class="col-sm-2 control-label" style="text-align:left;">Year of join : </label>
					 <div class="col-sm-8">
					 <select style="none;" name="join"  id="join">
				<?php 
						require_once 'includes/config.php';
					$qu1="SELECT * FROM year ";
					$query1=mysqli_query($conn,$qu1);
							
					while($num7=mysqli_fetch_array($query1)) {
							?>
							<option value="<?php echo $num7[year]; ?>"><?php echo $num7[year]; ?></option>
							<?php } ?>
					</select>
					</div>
			</div>
		
			<div class="form-group">
			<label class="col-sm-2 control-label" style="text-align:left;">Branch: </label>
			<div class="col-sm-8">
			<select style="none;"name="ab">
					<?php 
						require_once 'includes/config.php';
					$qu="SELECT * FROM department ";
					$query=mysqli_query($conn,$qu);
							
					while($num=mysqli_fetch_array($query)) {
							?>
					<option value="<?php echo $num[department_id]; ?>"><?php echo $num[department_name]; ?></option>
			 
					<?php } ?>
			</select>
			</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label" style="text-align:left;">Email </label>
				<div class="col-sm-8">
				<input type="email" name="email" id="email"  class="form-control" required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="text-align:left;">Contact No : </label>
				<div class="col-sm-8">
				<input type="number" name="contact" id="contact"  class="form-control" required="required">
				
				</div>
			</div>
			<div class="form-group">
					<label class="col-sm-2 control-label" style="text-align:left;">Payment Option: </label>
					<div class="col-sm-8">
					<select style="none;"name="payment">
						
					<option value="1">60000</option>
					<option value="2">30000</option>
					<option value="3">20000</option>
					<option value="4">15000</option>
				
					</select>
					</div>
			</div>




			<div class="form-group">
					<label class="col-sm-2 control-label" style="text-align:left;">Password: </label>
					<div class="col-sm-8">
					<input type="password" name="password" id="password"  class="form-control" >
					
					</div>
			</div>

		<div class="form-group">
					<label class="col-sm-2 control-label" style="text-align:left;">Confirm Password : </label>
					<div class="col-sm-8">
					<input type="password" name="cpassword" id="cpassword"  class="form-control" >
					</div>
		</div>
						



		<div class="col-sm-6 col-sm-offset-4">
			<button class="btn btn-default" type="reset" value="reset">Clear</button>
			<input type="submit" id = "sub" name="submit" Value="Register" class="btn btn-primary">
		</div>
		</form>


									</div>
									</div>
								</div>
							</div>
						</div>
							</div>

               
                    </div>
                </div>
            </main>
            
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
			<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
        
    </body>
	

		<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>
</html>

