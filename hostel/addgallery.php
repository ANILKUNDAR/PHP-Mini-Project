<?php
	require_once 'includes/config.php';
/*
	$target_dir = "C:/AppServ/www/newhostel/Employee Leave Management System/elms/admin/gallary/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      */
	  
	  /*$file = rand(1000,100000)."-".$_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];

		$folder="C:/AppServ/www/newhostel/Employee Leave Management System/elms/admin/gallary/";
 
		move_uploaded_file($file_loc,$folder.$file);
		$conn->query("INSERT INTO `gallary` (g_name) VALUES('$file')") or die(mysqli_error());
		
		echo"<script>alert('Succssfully added'); ";
		echo "</script>";
		
		
		*/
   /* } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
*/	
/*if(ISSET($_POST['submit'])){
$file = rand(1000,100000)."-".$_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];

		$folder="D:/";
 
		move_uploaded_file($file_loc,$folder.$file);
				 /*$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
				 mysql_query($sql); 
			$conn->query("INSERT INTO `gallary` (g_name) VALUES('$file')") or die(mysqli_error());
		echo"<script>alert('Succssfully added'); ";

		echo "</script>";*
}
		$file_tmp =$_FILES['file']['tmp_name'];
		$file_name = $_FILES['file']['name'];
		 move_uploaded_file($file_tmp,"images/".$file_name);
		/*$photo_name = $_FILES['file']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'],"gallary/" . $_FILES['file']['name']);
		$conn->query("INSERT INTO `gallary` (g_name) VALUES('$photo_name')") or die(mysqli_error());*/
		if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false){
$image = addslashes(file_get_contents($_FILES['file']['tmp_name']));

       
        
        //Create connection and select DB
  
        
        // Check connection
       
        
        //Insert image content into database
        $insert = $conn->query("INSERT into gallary (g_name) VALUES ('$image')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
		}
		
		
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Hostel|gallery</title>
        
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
