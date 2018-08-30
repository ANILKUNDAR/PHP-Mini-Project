<?php
	require_once 'includes/config.php';
	if(ISSET($_POST['submit'])){
		$name = $_POST['firstName'];
		$id=$_REQUEST['id'];
		$password=$_POST[password];
		
		$contact = $_POST['mobileno'];

		
	$conn->query("UPDATE staff SET staff_name = '$name' , staff_contact = '$contact', password ='$password' WHERE staff_id='$id';");
		
		

echo"<script>alert('Succssfully updated'); ";

echo "</script>";
	}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Staff</title>
        
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
	<div class="row">
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
									$a=$_REQUEST[staff_id];
									
								
									$qu="SELECT * FROM staff where staff_id='$a' ";
									$query=mysqli_query($conn,$qu);
				
								while($num1=mysqli_fetch_array($query)) {
									?>
        
 
								<form method="post">

									<div class="input-field col m6 s12">
									<label for="firstName">Name</label>
									<input id="firstName" name="firstName" value="<?php echo $num1[staff_name];?>"  type="text" >
									</div>

								
									
									<div class="input-field col s12">
									<label for="phone">Contact Number</label>
									<input id="phone" name="mobileno" type="tel" value="<?php echo $num1[staff_contact];?>" maxlength="10" autocomplete="off" >
									 </div>
									 <div class="input-field col s12">
									<label for="phone">password</label>
									<input id="phone" name="password" type="tel" value="<?php echo $num1[password];?>" maxlength="10" autocomplete="off" >
									 </div>
									 <div class="input-field col s12">
									  <input type="hidden" name="id" value="<?php echo "$a"; ?>">
									 <input  class="btn" type="submit" name="submit" value="update">
								 </div>
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
