
<?php
 session_start();
$id=$_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Hostel |Check-In/out</title>
		<link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">




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
		<!-- Latest compiled JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
input {
  padding:10px;
	font-family: FontAwesome, "Open Sans", Verdana, sans-serif;
  font-style: normal;
  font-weight: normal;
  text-decoration: inherit;
  border-radius: 0 !important;
}

.form-control {
  border-radius: 0 !important;
  font-size: 12x;
}

.clickable { cursor: pointer; }
</style>
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;

  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
<script type="text/javascript">
		
			function printChecked(){
				
				var checkin = $("#checkin").val();
				var checkout = $("#checkout").val();
				var date = $("#date").val();
					var staff = $("#staff").val();
				
				var items=document.getElementsByName('acs');
				var selectedItems0=new Array();
				if(checkout < checkin){
					alert('improper data given');
				}else{
				
				if((checkin < date)||(checkout < date)){	
				alert('Must be present date');
				}else{
				for(var i=0; i<items.length; i++){
					if(items[i].type=='checkbox' && items[i].checked==true)
						selectedItems0.push(items[i].value);	
					a = selectedItems0.length;
					
				}
				if(a==0){
					alert("please Select");
				}else{
				
				
				$.ajax({
					type:"POST",
					url : "nextcheckincheckout.php",
					data : {
						attendance1 : JSON.stringify(selectedItems0),
				
						check_in : checkin,
						
						check_out : checkout,
						staff1 : staff
					},
					async: false,
					dataType : "json",
					success : function(data) {
						if(data=="success"){
						alert("success");
						location.reload();
						}else{
						alert("fail");
						location.reload();
						}
					}
				})
				}	}	
			}			
			}
			
		</script>
  </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('sidebar.php');?>
            <main class="mn-inner" style="margin-left:10vw;">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"><p  style="font-weight: bold;">Checkin /Checkout</p></div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form class="col s12" name="chngpwd" method="post">
                                         
											<div class="row" >
												
												

													<div class="container" class="ui checkbox">
  
													<div class="form-group">
											 CHECK IN: <input type="date" class="form-control clickable input-md" id="checkin" placeholder="&#xf133;  Check-In">
											</div>
											<input type="hidden"  value=<?php echo date("Y-m-d"); ?> id="date" >
											<div class="form-group">
											 CHECK OUT: <input  type="date" class="form-control clickable input-md" id="checkout" placeholder="&#xf133;  Check-Out">
											</div>
											  <input type='hidden' id="staff" name="staff"  value=<?php echo $id; ?> />
											<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

										<table class="responsive-table"  id="myTable">
													<?php 
														require_once 'includes/config.php';
														$qu="SELECT * FROM student  ";
														$query=mysqli_query($conn,$qu);
														while($num1=mysqli_fetch_array($query)) {
													?>
													<tr class="header">	
													<td><input type="checkbox"  class="roundedTwo"  name="acs" value="<?php echo $num1[student_id];?>" style="opacity:1;position:relative;left:0;" > &nbsp <?php echo $num1[student_name];?><br>
														</td>
														
														<?php } ?>
														
													</tr>	
												
													
													</table>
													<input type="button" onclick='printChecked()' class = "btn waves-effect waves-teal" value="Submit"/>
											</div>
									
											
											
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
        <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


</script>
    </body>
</html>
