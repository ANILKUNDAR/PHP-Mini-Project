<?php

session_start();
date_default_timezone_set("Asia/kolkata");
require_once 'includes/config.php';
$a="PassWord";
$b=$_SESSION["password"];



if($a==$b)
{

if(isset($_POST['signin']))
{
$Register=$_POST['regno'];
$password=$_POST['password'];
echo "$Register.$password";

$qu="SELECT * FROM student WHERE register_no='$Register' and password='$password'";
$query=mysqli_query($conn,$qu);
$num=mysqli_fetch_array($query);
if($num>0)
{

$_SESSION['name']=$_num['student_name'];
$_SESSION['id']=$num['student_id'];
$_SESSION['cast']=$num['cast'];


echo '<script>window.location.href = "myprofile.php";';
echo"alert('Succssfully login'); ";
echo "</script>";
	
}
else{

	echo '<script>window.location.href = "index.php";';
	echo"alert('failed login'); ";
echo "</script>";
}
}
?>
<?php


$myquery="SELECT * FROM payment_original";
	
	$fetched=mysqli_query($conn,$myquery);
	
	while($rowvalue=mysqli_fetch_array($fetched))
	{
		$id=$rowvalue['id'];
		$dates=$rowvalue['expiredate'];
       //echo $dates;
	  $cur_date= date("Y-m-d");
	   if($cur_date > $dates)
	   {
		   
	  $daysLeft = abs(strtotime($cur_date) - strtotime($dates));
      $diff =  $daysLeft /(60 * 60 * 24);
	  
		
	
	   
	   $due=(int)$diff * 10;
	  
	   $mysql_qrys="UPDATE payment_original SET due = $due  WHERE id = '$id'";
 $conn->query($mysql_qrys);



	   
	   }
	   else{
	   }
	}

       
 
		
 
 ?>
				<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>HOSTEL|HOME</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">      
                            <span class="chapter-title">HOSTEL</span>
                        </div>
                      
                           
                        </form>
                     
                        
                    </div>
                </nav>
            </header>
           
           
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                   
                  
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" style="">
                    <li>&nbsp;</li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="index.php"><i class="material-icons">account_box</i>Student Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="forgot-password.php"><i class="material-icons">account_box</i>Student Register</a></li>
                
                       <li class="no-padding"><a class="waves-effect waves-grey" href="admin/"><i class="material-icons">account_box</i>Admin Login</a></li>
                <li class="no-padding"><a class="waves-effect waves-grey" href="stafflogin.php"><i class="material-icons">account_box</i>Staff Login</a></li>

                </ul>
     
                </div>
            </aside>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                      

                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">Student Login</span>
                                         <?php if($msg){?><div class="errorWrap"><strong>Error</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                       <div class="row">
                                           <form class="col s12" name="signin" method="post">
                                               <div class="input-field col s12">
                                                   <input id="username" type="text" name="regno" class="validate" autocomplete="off" required >
                                                   <label for="regno">Register Number</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" type="password" class="validate" name="password" autocomplete="off" required>
                                                   <label for="password">Password</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">
                                                
                                                   <input type="submit" name="signin" value="Sign in" class="waves-effect waves-light btn teal">
                                               </div>
                                           </form>
                                      </div>
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
        
    </body>
</html>
<?php }else{
echo '<script>window.location.href = "../index.php";';

echo "</script>";
}	?>