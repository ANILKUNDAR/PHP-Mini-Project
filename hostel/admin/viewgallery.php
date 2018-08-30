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
		        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">
		    <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
  

     
        	
        <!-- Theme Styles -->

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
.img:hover{
    color: #424242; 
  -webkit-transition: all .8s ease-in;
  -moz-transition: all .8s ease-in;
  -ms-transition: all .8s ease-in;
  -o-transition: all .8s ease-in;
  transition: all .8s ease-in;
  opacity: 1;
  transform: scale(1.15);
  -ms-transform: scale(1.15); /* IE 9 */
  -webkit-transform: scale(1.15); /* Safari and Chrome */

}
        </style>
    </head>
    <body>
	 <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
     <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">GALLERY</div>
                    </div>
					<?php
					require_once 'includes/config.php';
					  $qu="SELECT * from gallary";
						$query=mysqli_query($conn,$qu);
						while($num2=mysqli_fetch_array($query)) {
							?>
						<!--  <div class="row">
						  <div class="col m6">
						<?php /*echo '<img src="data:image/jpeg;base64,'.base64_encode( $num2['g_name'] ).'"  style="width:750px;height:250px" />'; }*/ ?>
						  
						  </div>
						  </div>-->
						  <div class="row" >
							<div class="col s12 m6 l6" >
      
						<div class="card small" style="background-color:#cce6ff" >
				
              <div class="card-content" style="margin-right:15px">
               <?php echo '<img class="img" src="data:image/jpeg;base64,'.base64_encode( $num2['g_name'] ).'"  style="width:750px;height:250px" />';  ?>
			   <a  onclick = "confirmationDelete(this); return false;" href="deletegallay.php?g_id=<?php echo $num2['g_id']?>" ><i  class="material-icons">delete</i></a>
              </div>
             
            </div>
</div>
			<?php } ?>			
					 
						
					
                
                </div>
            </main>
        
        <!-- Javascripts -->
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>
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
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
	

        
    </body>
</html>
