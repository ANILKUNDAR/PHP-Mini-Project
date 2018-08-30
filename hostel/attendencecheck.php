<!DOCTYPE html>
<?php 
			require_once 'includes/config.php';
			session_start();
?>

<html lang="en">
    <head>
        <!-- Title -->
        <title>HOSTEL|attendance</title>
        
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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <div class="page-title"></div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
				<div class="card-content">
					<div class="wizard-content">
                        <div class="row">
                            <div class="col m6">
                                <div class="row">	
								
									<div class="container" STYLE="WIDTH:1000PX">
   <H4>Search By Date</H4>
<input class="form-control" style="font-size:25px;" id="myInput" type="text" placeholder="Search..">
  <br>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>date</th>
        <th>result</th>
       
      </tr>
    </thead>
<?php 
									
									$a=$_SESSION['id'];
							
									$qu="SELECT * FROM attendance where student_name='$a' ";
									$query=mysqli_query($conn,$qu);
				
									while($num1=mysqli_fetch_array($query)) {
									
									?>
    <tbody id="myTable">
      <tr>
        <th><?php echo "$num1[date1]";   ?></th>
        <th><?php echo "$num1[value]";   ?></th>
        
      </tr>
	  
									<?php } ?>	
    </tbody>
  </table>
  


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
        <script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
	  
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
    <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="assets/js/alpha.min.js"></script>
    <script src="assets/js/pages/form_elements.js"></script>	
        
    </body>
</html>
