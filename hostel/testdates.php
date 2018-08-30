<?php
require_once 'includes/config.php';


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
	  echo abs(strtotime('2010-09-24') - strtotime('2010-09-25'))."\n<br />";
	    echo $daysLeft ."\n<br />";
		
	
	   
	   $due=(int)$diff * 10;
	  
	   $mysql_qrys="UPDATE payment_original SET due = $due  WHERE id = '$id'";
 



	   
	   }
	   else{
	   }
	}

       
 
		
 
 ?>