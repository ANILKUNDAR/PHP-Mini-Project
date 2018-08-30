<!DOCTYPE html>
<?php 
			require_once 'includes/config.php';
			session_start();
			if(ISSET($_POST['submit'])){
		$name = $_POST['firstName'];
		
		$id=$_SESSION['id'];
		$registerno = $_POST['lastName'];

		$contact = $_POST['mobileno'];

		
	$conn->query("UPDATE student SET student_name = '$name', register_no = '$registerno',contactno = '$contact' WHERE student_id='$id';");
		
		

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
        </style>
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
									
									$a=$_SESSION['id'];
								
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
									<input  name="email" type="email" id="email" value="<?php echo $num1[email];?>"  autocomplete="off" readonly>
									<span id="emailid-availability" style="font-size:12px;"></span> 
									</div>

									<div class="input-field col s12">
									<label for="phone">Contact Number</label>
									<input id="phone" name="mobileno" type="tel" value="<?php echo $num1[contactno];?>" maxlength="10" autocomplete="off" >
									 </div>
									 
									 <?php 
									$qu="SELECT room.room_number FROM room,student where student.room_number=room.room_id and student.student_id='$a' ";
									$query=mysqli_query($conn,$qu);
				
									while($num2=mysqli_fetch_array($query)) {
										?>
									<div class="input-field col m6 s12">
									<label for="lastName">Room Number</label>
									<input id="lastName" name="roomnumber" value="<?php echo "$num2[room_number]";  } ?>" type="text" autocomplete="off" readonly>
									</div>
									<div class="input-field col  s12">
									 <input type="hidden" name="id" value="<?php echo "$a"; ?>">
									<input class="btn" type="submit" name="submit" value="Update"/>
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
    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="assets/js/alpha.min.js"></script>
    <script src="assets/js/pages/form_elements.js"></script>	
        
    </body>
</html>
