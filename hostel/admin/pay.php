<?php
	require_once 'includes/config.php';
	if(ISSET($_POST['submit'])){
	
		$amount = $_POST['amount'];
		$a=$_REQUEST[student_id];
$b=$_REQUEST[email];
$qu="select * from payment_original where email='$b'";
				$query=mysqli_query($conn,$qu);
				
			while($num1=mysqli_fetch_array($query)) {
		 $a=$num1[paid];
		 $c=$a+$amount;
		 $d=$num1[installment];
		$e=$d+1;
			if($c<=60000)
		 {
			 $conn->query("UPDATE payment_original SET paid = '$c' ,installment='$e'  WHERE email = '$b'");
		
	 
	 echo"<script>alert('Succssfully register'); ";
echo 'window.location.href = "payment.php";';
		 echo "</script>";
		 }else{
			 echo"<script>alert('Payment Done'); ";
echo 'window.location.href = "payment.php";';
		 echo "</script>";
		 }
			}
		
		

	}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Pay</title>
        
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
                                 
                                  <H1>  <span class="card-title">PAYMENT</span></h1>
                             <form method="post">
							
  <div class="input-field col s12">
<input id="departmentname" type="text"  class="validate" autocomplete="off" name="amount"  required>
                                                <label for="deptname">AMOUNT</label>
                                            </div>

 
  <button type="submit"  name="submit" class="btn btn-primary">PAY</button>
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
