<!DOCTYPE html>
<?php 
			require_once 'includes/config.php';
			session_start();
			if(ISSET($_POST['submit'])){
		$name = $_POST['firstName'];
		
		$id=$_SESSION['id'];
		$registerno = $_POST['lastName'];
			$email = $_POST['email'];
		$contact = $_POST['mobileno'];

		
	$conn->query("UPDATE student SET student_name = '$name', register_no = '$registerno',email ='$email',contactno = '$contact' WHERE student_id='$id';");
		
		

echo"<script>alert('Succssfully updated'); ";

echo "</script>";
	}
?>
<html lang="en">
    <head>
        <!-- Title -->
        <title>Employee | Change Password</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
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
					table, td, th {    
    border: 1px solid #ddd;

}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 40px;
}

td{
	    padding-right: 5px;
    padding-left: 25px;
}
        </style>
    </head>
    <body>
	<?php include('includes/header.php');?>  
    <?php include('includes/sidebar.php');?>
    <main class="mn-inner">
	<div class="row">
        <div class="col s12">
            <div class="page-title">Payment</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
				<div class="card-content">
					<div class="wizard-content">
                        <div class="row">
                            <div class="col m6">
                                <div class="row">
									<?php 
									
									$a=$_SESSION['id'];
								
									$qu="SELECT * FROM student where student_id='$a' ";
									$query=mysqli_query($conn,$qu);
				
									while($num1=mysqli_fetch_array($query)) {
										$b=$num1['email'];
										$qu="SELECT * FROM payment_original where email='$b' ";
									$query=mysqli_query($conn,$qu);
				
									while($num2=mysqli_fetch_array($query)) {
										
										
										
									?>
														<table >
														<thead>
														  <tr>
															  <th>Joinning Date</th>
															  <th>Paid Installment</th>
															  <th>Total Installment</th>
															  <th>Total Money</th>
															  <th>Paid</th>
															    <th>Pending</th>
																 <th>Expire Date</th>
																 <th>Due</th>
														  </tr>
														</thead>

														<tbody>
														  <tr>
															<td><?php echo $num2['date']?></td>
															<td><?php echo $num2['installment']?></td>
															<td><?php echo $num2['payment_type']?></td>
															<td><?php echo 60000;?></td>
															<td><?php echo $num2['paid']?></td>
															<td><?php echo $num2['pending']?></td>
														<td><?php echo $num2['expiredate']?></td>
														<td><?php echo $num2['due']?></td>
														  </tr>
														
														</tbody>
													  </table>
            
 
			

									
								</div>
							</div>
                                                    
								
									<?php } } ?>
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
    <script src="assets/js/pages/form_elements.js"></script>	
        
    </body>
</html>
