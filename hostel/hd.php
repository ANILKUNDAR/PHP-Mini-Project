<!DOCTYPE html>
<?php 
			
	require_once 'includes/config.php';
		if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false){
$image = addslashes(file_get_contents($_FILES['file']['tmp_name']));

       
        
        //Create connection and select DB
  
        
        // Check connection
       
        
        //Insert image content into database
        $insert = $conn->query("INSERT into gallary (g_name) VALUES ('$image')");
        if($insert){
            echo "<script>alert(File uploaded successfully.)</script>";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
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
    <?php include('sidebar.php');?>
    <main class="mn-inner">
	<div class="row">
        <div class="col s12">
   
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
				<div class="card-content">
					     <H1>  <span class="card-title">ADD GALLERY</span></h1>
                             <form method="post" enctype="multipart/form-data">
							
<div style="margin-left:0px;margin-bottom:5px";>
  <input type="file" name="file" id="fileToUpload">
                                            </div>
 
  <button type="submit"  name="submit" class="btn btn-primary">ADD</button>
</form>
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
