     <?php //session_start(); ?>
	 <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper" style="background-color: #e6ffff">
                    
              
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                  
  <li class="no-padding"><a class="waves-effect waves-grey" style=" color: #00acc1;" href="myprofile.php"><i class="material-icons">account_box</i>My Profiles</a></li>
  <li class="no-padding"><a class="waves-effect waves-grey" style=" color: #00acc1;" href="money.php"><i class="material-icons">payment</i>Payment</a></li>
   <?php if($_SESSION['cast']=="Catholic") { ?>
    <li class="no-padding"><a class="waves-effect waves-grey" style=" color: #00acc1;" href="attendencecheck.php"><i class="material-icons">account_box</i>attendence </a></li>
   <?php } ?>
       <li class="no-padding"><a class="waves-effect waves-grey" style=" color: #00acc1;" href="checkinn.php"><i class="material-icons">account_box</i>Checkin/Checkout </a></li>
   <li class="no-padding"><a class="waves-effect waves-grey" style=" color: #00acc1;" href="result.php"><i class="material-icons">account_box</i>Result</a></li>
  <li class="no-padding"><a class="waves-effect waves-grey" style=" color: #00acc1;" href="gallery.php"><i class="material-icons">settings_input_svideo</i>Gallery</a></li>
  
                
         
               
                  <li class="no-padding">
                                <a class="waves-effect waves-grey" style=" color: #00acc1;" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>  
                 
                   
                </ul>
               
                </div>
            </aside>