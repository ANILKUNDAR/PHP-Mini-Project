<?php
require_once 'includes/config.php';
if(ISSET($_POST['submit'])){
		$department = $_POST['ab'];
		$year = $_POST['abc'];
		$sem = $_POST['sem'];
				/*$file = addslashes(file_get_contents($_FILES['file']['tmp_name']));
				$file_name = addslashes($_FILES['file']['name']);
				$file_size = getimagesize($_FILES['file']['tmp_name']);
				move_uploaded_file($_FILES['file']['tmp_name'],"C:/AppServ/www/newhostel/Employee Leave Management System/elms/admin/photos". $_FILES['file']['name']);
				
				echo"success";*/
		$file = rand(1000,100000)."-".$_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];

		$folder="C:/AppServ/www/HOSTELNEW/hostel/admin/photos/";
 
		move_uploaded_file($file_loc,$folder.$file);
				 /*$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
				 mysql_query($sql); */
		$conn->query("INSERT INTO `result` (department_id,yearofjoin1,sem,photo) VALUES('$department','$year','$sem','$file')") or die(mysqli_error());
		echo"<script>alert('Succssfully added'); ";

		echo "</script>";
	}
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
								<H1>
									<span class="card-title">ADD ROOM</span>
								</h1>
								<form method="post" enctype="multipart/form-data">
								Department :
									<select name="ab">
											<?php 
												require_once 'includes/config.php';
												$qu="SELECT * FROM department ";
												$query=mysqli_query($conn,$qu);
												while($num=mysqli_fetch_array($query)) {
											?>
											<option value="<?php echo $num[department_id]; ?>"><?php echo $num[department_name]; ?></option>
											 
											<?php } ?>
									</select>


								year:
									<select name="abc">
											<?php 
											require_once 'includes/config.php';
											$qu="SELECT distinct yearofjoin FROM student";
											$query=mysqli_query($conn,$qu);
											while($num1=mysqli_fetch_array($query)) {
											?>
											<option value="<?php echo $num1[yearofjoin];?>"><?php echo $num1[yearofjoin]; ?></option>
											<?php } ?>
									</select>
									<div style="margin-left:0px;margin-bottom:5px";>
									<input   type="Text" name="sem"  placeholder="SEMISTER"/>
									<input   type="file" name="file" />
                                    </div>
									<button type="submit"  name="submit" class="btn btn-primary">ADD</button>
								</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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