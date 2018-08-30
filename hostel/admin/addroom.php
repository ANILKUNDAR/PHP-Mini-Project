<?php
	require_once 'includes/config.php';
	if(ISSET($_POST['submit'])){
		$floor = $_POST['ab'];
		$department = $_POST['abc'];
			$room = $_POST['roomnumber'];
		$people = $_POST['people'];

		
	$conn->query("INSERT INTO `room` (floor_id, department_id, room_number, room_quantity) VALUES('$floor', '$department', '$room', '$people')") or die(mysqli_error());
		
		

echo"<script>alert('Succssfully register'); ";

echo "</script>";
	}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | room</title>
        
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
                <div class="middle-content">
                    <div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l4">
                       
                    </div>
                       
                    
                </div>
                 
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l12">
                            <div class="card invoices-card">
                                <div class="card-content">
                                 
                                  <H1>  <span class="card-title">ADD ROOM</span></h1>
                             <form method="post">
							 Floor :
							 <select name="ab">
				<?php 
					require_once 'includes/config.php';
				$qu="SELECT * FROM floor ";
				$query=mysqli_query($conn,$qu);
				
			while($num=mysqli_fetch_array($query)) {
				?>
        <option value="<?php echo $num[floor_id]; ?>"><?php echo $num[floor_name]; ?></option>
 
			<?php } ?>
			</select>


  					 department:
 <select name="abc">
				<?php 
					require_once 'includes/config.php';
				$qu="SELECT * FROM department ";
				$query=mysqli_query($conn,$qu);
				
			while($num1=mysqli_fetch_array($query)) {
				?>
        <option value="<?php echo $num1[department_id];?>"><?php echo $num1[department_name]; ?></option>
 
			<?php } ?>
			</select>
   <div class="input-field col s12">
<input id="departmentname" type="text"  class="validate" autocomplete="off" name="roomnumber"  required>
                                                <label for="deptname">Room Number</label>
                                            </div>
  
  <div class="input-field col s12">
<input id="departmentname" type="text"  class="validate" autocomplete="off" name="people"  required>
                                                <label for="deptname">number of people</label>
                                            </div>

 
  <button type="submit"  name="submit" class="btn btn-primary">ADD</button>
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </main>
          
        </div>

        
        
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
