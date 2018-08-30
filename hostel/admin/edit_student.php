<?php
	require_once 'includes/config.php';
	if(ISSET($_POST['submit'])){
		$name = $_POST['firstName'];
		$id=$_REQUEST['id'];
		$registerno = $_POST['lastName'];
			$email = $_POST['email'];
		$contact = $_POST['mobileno'];

		
	$conn->query("UPDATE student SET student_name = '$name', register_no = '$registerno',email ='$email',contactno = '$contact' WHERE student_id='$id';");
		
		

echo"<script>alert('Succssfully register'); ";

echo "</script>";
	}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Student</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        

        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
           <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>

             <main class="mn-inner">
	<div class="row" style="margin-top:20px">
        <div class="col s12">
            <div class="page-title">Profile</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
				<div class="card-content">
					<div class="wizard-content">
                        <div class="row">
                            <div class="col m6">
                                <div class="row">
									<?php
									$a=$_REQUEST[student_id];
									
								
									$qu="SELECT * FROM student where student_id='$a' ";
									$query=mysqli_query($conn,$qu);
				
								while($num1=mysqli_fetch_array($query)) {
									?>
        
 
								<form method="post">

									<div class="input-field col m6 s12">
									<label for="firstName">Name</label>
									<input id="firstName" name="firstName" value="<?php echo $num1[student_name];?>"  type="text" >
									</div>

									<div class="input-field col m6 s12">
									<label for="lastName">Register Name </label>
									<input id="lastName" name="lastName" value="<?php echo $num1[register_no];?>" type="text" autocomplete="off" >
									</div>
									
									<div class="input-field col m6 s12">
									<label for="lastName">Year of Join </label>
									<input id="lastName" name="join" value="<?php echo $num1[yearofjoin];?>" type="text" autocomplete="off" readonly>
									</div>
									<?php 
									$qu="SELECT department_name FROM department where department_id='$num1[branch]' ";
									$query=mysqli_query($conn,$qu);
				
									while($num2=mysqli_fetch_array($query)) {
										?>
									<div class="input-field col m6 s12">
									<label for="lastName">Branch</label>
									<input id="lastName" name="branch" value="<?php echo "$num2[department_name]"; } ?>" type="text" autocomplete="off" readonly>
									</div>
									

									<div class="input-field col s12">
									<label for="email">Email</label>
									<input  name="email" type="email" id="email" value="<?php echo $num1[email];?>" readonly autocomplete="off" >
									<span id="emailid-availability" style="font-size:12px;"></span> 
									</div>

									<div class="input-field col s12">
									<label for="phone">Contact Number</label>
									<input id="phone" name="mobileno" type="tel" value="<?php echo $num1[contactno];?>" maxlength="10" autocomplete="off" >
									 </div>
									  <input type="hidden" name="id" value="<?php echo "$a"; ?>">
									 <input class="btn" type="submit" name="submit" value="update" >
								
									</form>
									
								</div>
							</div>
                                                    
								
									<?php  } ?>
                        </div>
                    </div>
                </div>
			</div>
		</div>
             
                   
                
    </main>

    </div>
    <div class="left-sidebar-hover"></div>

        
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/plugins/chart.js/chart.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>

        
    </body>
</html>
