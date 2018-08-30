<?php 
session_start();
$a=$_SESSION['id1'];
if(ISSET($a))
{
	


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Dashboard</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
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
                    <div class="col s13 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                            
                                <span class="card-title">Students</span>
                                <span class="stats-counter">
								<?php require_once 'includes/config.php';
								$qu="SELECT *  FROM student";
								$query=mysqli_query($conn,$qu);
								$num=mysqli_num_rows($query) ;
								
								
								?>
								<span class="counter"><?php echo $num;?></span></span>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div>
                        <div class="col s13 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                            
                                <span class="card-title">Staff</span>
								  <span class="stats-counter">
								<?php require_once 'includes/config.php';
								$qu="SELECT *  FROM staff";
								$query=mysqli_query($conn,$qu);
								$num1=mysqli_num_rows($query) ;
								
								
								?>
								<span class="counter"><?php echo $num1;?></span></span>
                               
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s13 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Floors</span>
								<span class="stats-counter">
								<?php require_once 'includes/config.php';
								$qu="SELECT *  FROM floor";
								$query=mysqli_query($conn,$qu);
								$num2=mysqli_num_rows($query) ;
								
								
								?>
								<span class="counter"><?php echo $num2;?></span></span>
                              
                      
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
					 <div class="col s13 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Rooms</span>
							<span class="stats-counter">
								<?php require_once 'includes/config.php';
								$qu="SELECT *  FROM room";
								$query=mysqli_query($conn,$qu);
								$num2=mysqli_num_rows($query) ;
								
								
								?>
								<span class="counter"><?php echo $num2;?></span></span>
                              
                      
                            </div>
                            <div id="sparkline-line"></div>
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
<?php 
}
else
{
	echo '<script>window.location.href = "index.php";';
echo"alert('Please login'); ";
echo "</script>";
}
?>
