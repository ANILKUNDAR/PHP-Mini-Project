
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>Staff</title>
        
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

    </div>
    <div class="left-sidebar-hover"></div>
        
    <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="assets/js/alpha.min.js"></script>
    <script src="assets/js/pages/form_elements.js"></script>	
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
