<?php 
session_start();
	$conn = new mysqli("localhost", "root", "12345678", "newhostel") or die(mysqli_error());
	if(ISSET($_POST['submit'])){
		$password = $_POST['password'];
	$qu="SELECT * FROM admin ";
				$query=mysqli_query($conn,$qu);
				
			while($num1=mysqli_fetch_array($query)) {
				
          $a=$num1[password];
           if($a==$password){
			   $_SESSION["password"]=$password;
			   echo"<script>alert('Succssfully '); ";
echo 'window.location.href = "hostel/index.php";';
echo "</script>";
		   }else{
			   echo"<script>alert('Password wrong'); ";
echo 'window.location.href = "index.php";';
echo "</script>";
		   }
	} } ?>
<!DOCTYPE html>
<html lang = "en">

	<head>
		<meta charset = "utf-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
		<title>HOSTEL</title>

		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap-theme.min.css">
		<link rel = "stylesheet" type = "text/css" href = "css/style.css">
		<link rel = "stylesheet" type = "text/css" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src = "js/jquery.min.js"></script>
		<script type="text/javascript" src = "js/bootstrap.min.js"></script>

	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">ST ALOYSIUS BOYS HOSTEL</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#admn">Admission</a></li>
						<li><a data-toggle="modal" data-target="#myModal">Login/Register</a></li>
					</ul>
				</div>
			</nav>
			<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enter Password</h4>
        </div>
        <div class="modal-body">
		<form class = "text-center" method="post">
          <input name="password" type = "password" class = "form-control"/>
		  <button style = "margin-top : 2vh;" class = "btn btn-success" name="submit" type = "submit">SUBMIT</button>
		 </form>
        </div>
      </div>
      
    </div>
  </div>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
				<div class="item active">
				  <img src="images/003.jpg" alt="Chania">
				</div>

				<div class="item">
				  <img src="images/001.jpg" alt="Chicago">
				</div>

				<div class="item">
				  <img src="images/002.jpg" alt="New York">
				</div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
			
			<div style = "margin-top : 8vh;" class="container-fluid">
				<div class="row">
				
					<div class="col-sm-4 abc" style="overflow:hidden;">
					<h3 class = "up1"> Events</h3>
					<div style="overflow-y:scroll;height:79%">
					<?php $qu="SELECT * FROM event ";
				$query=mysqli_query($conn,$qu);
				
			while($num1=mysqli_fetch_array($query)) {
				?>
          
           
					
					
						
					
						<div>
						<h4><?php  echo $num1[name]; ?></h4>
						<p><?php  echo $num1[event]; ?></p>
						</br>
						</div>
					
			<?php } ?></div>
					</div>
					<div class="col-sm-8 abc" style="overflow:hidden;">
						<h3 class = "up2" style = "">Gallery</h3>
						<div class="row img" style="overflow-y:scroll;overflow-x:hidden;height:80%;">
						<?php
					
					  $qu="SELECT * from gallary";
						$query=mysqli_query($conn,$qu);
							
						while($num2=mysqli_fetch_array($query)) { ?>
					
							<div class="col-sm-6 col1"style="margin:2vh;">
								<?php echo '<img class="img" src="data:image/jpeg;base64,'.base64_encode( $num2['g_name'] ).'"  style="width:750px;height:250px" />';  ?>
								<div class="middle mid1">
									<div class="text">gallary</div>
								</div>
							</div>
							
							<?php } ?>	
							</div>	
					</div>
				</div>
				<div class="row" id = "admn" style = "margin-top : 5vh;">
					<div class="col-sm-12">
						<h3 class = "text-center" style = "margin-bottom : 6vh;">Admission Process</h3>
						<p>Welcome to St Aloysius PU College. For 138 years St Aloysius College has stood high and proud on the Idgah Hill, admiring and being admired by the city and its education lovers. Renowned for its quality education, SAPUC remains true to the vision and mission of its mother institution, imparting all-round development to the students who choose it as their Alma Mater. Now that you have chosen to be a part of this glorious saga, here is how you can take the first step forward:</p>
						<p>SAPUC offers courses in Science,Commerce and Arts in various combinations. The applications for the same are available at the College office which remains open from 8.45am to 5.00pm.</p>
						<p>
						<?php
					
					  $qu="SELECT * from admission";
						$query=mysqli_query($conn,$qu);
							
						while($num2=mysqli_fetch_array($query)) { ?>
						<ul>
							<li><?php  echo $num2[description1]; ?></li>
							
						</ul>
						<?php } ?>
						</p>
						<p><b>The College facilitates NRI Students to apply for Eligibility certificate for which they need to produce the following:</b>
							<li>Statement of Marks of the qualifying exams</li>
							<li>Transfer Certificate</li>
							<li>Bonafide Certificate</li>
							<li>Migration Certificate issued from the university/board by the head of the institution where the student attended previously.</li>
						</p>
						<p><b class = "text-center">For more details kindly contact the College Office.</b></p>
					</div>
				</div>
			</div>
			<div class = "row">
				<div class = "jumbotron text-center">
					<h3>ST ALOYSIUS BOYS HOSTEL</h3>
					<p>Address Line 1</p>
					<p>Address Line 2</p>
					<p>Address Line 3</p>
					<p>Phone : +5341566564</p>
					<p>Email : abcdef@xyz.com</p>
				</div>
			</div>
			<footer>
				<p>Copyright</p>
			</footer>
		</div>
		<script type="text/javascript" src = "js/script.js"></script>
	</body>
</html>