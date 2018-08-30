<!DOCTYPE html>
<?php 
			require_once 'includes/config.php';
			session_start();
?>
<html lang="en">
    <head>
        <!-- Title -->
        <title>Employee | Result</title>
        
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
            <div class="page-title">Result</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
				<div class="card-content">
					<div class="wizard-content">
                        <div class="row">
                            <div class="col m6">
                                <div class="row">
								<div class="input-field col m6 s12">
																 <table class="bordered">
        <thead>
          <tr>
             
              <th>Year</th>
			  <th>Semister</th>
              <th>PDF</th>
          </tr>
        </thead>

									<?php 
									
									$a=$_SESSION['id'];
								
									$qu="SELECT branch,yearofjoin FROM student  where student_id='$a'";
									$query=mysqli_query($conn,$qu);
				
									while($num1=mysqli_fetch_array($query)) {
										$q=$num1[branch];
										$w=$num1[yearofjoin];
									$que="SELECT * FROM result r,department d where d.department_id=r.department_id AND yearofjoin1='$w' and d.department_id='$q'";
									
									$query=mysqli_query($conn,$que);
									while($num2=mysqli_fetch_array($query)) {
									
									
									?>
        
 
			

		
        <tbody>
          <tr>
            <td> <?php echo "$num2[yearofjoin1]";?> </td>
           <td style="text-align:center"> <?php echo "$num2[sem]";?> </td>
            <td> <?php echo "<a href='admin/photos/$num2[photo]'>VIEW PDF</a>";?> </td>
          </tr>
          <?php }?>
        </tbody>
      </table>

									
									

								</div>
							</div>
                                                    
									
										
											<?php } ?>
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
