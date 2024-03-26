<?php
include('header.php');
include ('../emailconfig_pri.php');
$pn=$_SESSION['process_name'];
$avp_emailid=$_SESSION['avp_emailid'];
$avp_name=$_SESSION['avp_name'];
$total_1=$_SESSION['pri_140_total'];
$total_2=$_SESSION['pri_normal_total'];
$total_3=$_SESSION['sim_total'];
?>


<?php 


if(isset($_POST['sub']))
{

	$req_date = $_POST['req_date'];
	$emp_name = $_POST['emp_name'];
	$emp_id = $_POST['emp_id'];
  $emp_desg = $_POST['emp_desg'];
	$req = $_POST['req'];
	$sim = $_POST['sim'];
  $sim_count = $_POST['sim_count'];
	$pri = $_POST['pri'];
	$pri_count = $_POST['pri_count'];

  
	$cost_center = $_POST['cost_center'];
	
	$ticket_number = $_POST['ticket_number'];
	
  $pri_req_reason = $_POST['pri_req_reason'];
	$additional_details = $_POST['additional_details'];
	


	$sql1="select * from pri_sim_request";
	$res1 = mysqli_query($conn,$sql1);
	$count=mysqli_num_rows($res1);
	$sr_no=$count+1;
	$ticket_number="TK".$sr_no;
	
	$sql = "INSERT INTO `pri_sim_request`(`sr_no`, `request_date`, `emp_name`, `emp_id`, `designation`, `requirement`, `sim_details`, `sim_count`, `pri_140_details`, `pri_140_count`, `pri_normal_details`, `pri_normal_count`, `cost_center`, `process_name`, `avp_emailid`,`ticket_no`,`existing_pri140_count`,`existing_normal_pri_count`,`existing_sim_count`,`pri_req_reason`, `additional_details`) VALUES ('$sr_no','$req_date','$emp_name','$emp_id','$emp_desg','$req','$sim','$sim_count','$pri','$pri_count','$pri_normal','$pri_normal_count','$cost_center','$pn','$avp_emailid','$ticket_number','$total_1','$total_2','$total_3','$pri_req_reason','$additional_details')";
	$res = mysqli_query($conn,$sql);


	if ($res==true)
	{
			
			$mail->addAddress($avp_emailid,$avp_name);
			
			$mail->Subject="PRI/SIM Request";
			$mail->Body="Dear Sir/Madam, <br><br>

            PRI/SIM Card request for <strong>  " .$pn. "</strong>  has been received. Kindly login at http://isms.silaris.in  to see details. <br> <br> Thank You! <br> <br><br><strong> Note: This is an auto generated mail.</strong>";

			$mail->send();
    
    
    
    echo "<script> alert('Information Saved Successfully!');location.href='dashboard.php';</script>";
	}
	 else
	{
		echo "<script> alert(''Information not Saved, Try Again'')</script>";
	} 
}
	?>

	<div class="main-dash">
		<div class="top-dash">
			<nav class="navbar navbar-expand-md bgdark navbar-dark">
			  <!-- Brand -->
			  <a class="navbar-brand" href="#">VERSION : 1.0.1</a>

			  <!-- Toggler/collapsibe Button -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <!-- Navbar links -->
			  <div class="collapse navbar-collapse" id="collapsibleNavbar">
			    <ul class="navbar-nav ml-auto">
			      <!-- <li class="nav-item">
			        <a class="nav-link" href="#">Home</a>
			      </li> 
			      <li class="nav-item">
			        <a class="nav-link" href="isms-policies.php">ISMS Policies</a>
			      </li> -->
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navbardrop"><i class="fa fa-user-circle"></i> <?php echo $adname?></a>
			         <div class="dropdown-menu">
				        <a class="dropdown-item" href="profile.php"> <i class="fa fa-user"></i> Profile</a>
				        <a class="dropdown-item" href="password.php"><i class="fa fa-lock"></i> Password</a>
				        <a class="dropdown-item" href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
				      </div>
			      </li>
			    </ul>
			  </div>
			  
			</nav>
		</div>
		<div class="side-dash">
			<?php include('sidebar.php');?>
		</div>
		<div class="body-dash">
			<form class="" method="POST" action="" enctype="multipart/form-data">
			
				<div class="container">
					<div class="jumbotron ">
						<h3 style="background-color:#0A1551; color:white;" class="text-center"> PRI/SIM CARD REQUEST FORM </h3> <br>

				<div class="row">

								
					<label style="color:#0A1551;margin-left:15px">Process Name</label>
					<input style="width:250px;margin-left:70px;" type="text" name="process_name" class="form-control" value="<?php echo $pn;?>" readonly>
							
  				
							
			       </div><br><br>

			   <div class="row">
			       	
							<label style="color:#0A1551;margin-left:15px;">Existing PRI-140 Count </label>
							<input style="width:70px;margin-left:20px;" type="text" name="exist_pri140_count" class="form-control" value="<?php echo $_SESSION['pri_140_total'];?>" readonly>
					
            
             
							<label style="color:#0A1551;margin-left:70px">Existing Normal PRI Count</label>
							<input style="width:70px;margin-left:20px;" type="text" name="exist_normal_pri_count" class="form-control" value="<?php echo $total_2;?>" readonly>
					
          
							<label style="color:#0A1551;margin-left:70px;">Existing SIM Count </label>
							<input style="width:70px;margin-left:20px;" type="text" name="exist_sim_count" class="form-control" value="<?php echo $total_3;?>" readonly>
				
          </div>    
					<hr size="8" width="100%" color="#23262C"><br>


			<div class="form-group row">
				<div class="col-lg-4 col-md-4">
				<label style="color:#0A1551">Request Received On</label>
				<input type="date" name="req_date" class="form-control" required>
				</div>
			</div>

				<div class="form-group row">
						<div class="col-lg-6 col-md-6">
						<label style="color:#0A1551"><strong>Employee Details (who raised this request)</strong></label>
					</div>
				</div>

				
				<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Employee Name</label>
							<input type="text" name="emp_name" class="form-control" required>
						</div>
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Employee ID (optional)</label>
							<input type="text" name="emp_id" class="form-control">
						</div>

			</div>
			<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Designation</label>
							<input type="text" name="emp_desg" class="form-control" required>
						</div>
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Request For </label>
              
							
              				<select id="rr" name="req" class="form-control" onchange="myfunc()" required>
						  		 <option value=""  hidden >Click to choose.....</option>
              					<option value="PRI">PRI</option>
              					<option value="SIM">SIM</option>
              					
              			</select>
						</div>

			</div>
			<div id="sim">
				<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Type of SIM</label>
              
							
              				<select  name="sim" class="form-control">
						  		 <option value="" hidden>Click to choose.....</option>
						  		 				
              					 <option value="2G">2G</option>
              					<option value="Volte">Volte</option>
              					
              			</select>
              
						</div>
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Required SIM Count</label>
							<input type="text" name="sim_count" class="form-control">
						</div>

			</div>

			</div>

			<div id="pri">
				<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Type of PRI</label>
              
							
              				<select  name="pri" class="form-control">
						  		 <option value="" hidden>Click to choose.....</option>
						  		 				
              					 <option value="PRI-140">PRI-140</option>
              					<option value="PRI-Normal">PRI-Normal</option>
              					
              			    </select>
						</div>
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Required PRI Count</label>
							<input type="text" name="pri_count" class="form-control">
						</div>

			</div>
			</div>

			

			
			<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Cost Center</label>
							
              				<select name="cost_center" class="form-control" required>
								  <option value="" hidden> Click to choose.....</option>
								  			
              					<option value="Silaris">Silaris</option>
              					<option value="Client">Client</option>
              				</select>
						</div>
								<div class="col-lg-6 col-md-6">
              					<label style="color:#0A1551">Request Reason </label>
												<select name="pri_req_reason" class="form-control" required>
                      			<option value="" hidden> Click to Choose.... </option>

                    		    <option value="Expansion"> Expansion </option>
                    			<option value="Replacement"> Replacement</option>
                    		   <option value="New Process">New Process</option>
  				            </select>
						</div>



						
						</div>

			
			
             
		    	</div>



    		  <div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="sub" value="SAVE">
				  </div>
				</div>
			</div>
		
			</form>
		</div>

<script type="text/javascript">
	function myfunc()
	{
		if(document.getElementById('rr').value=="PRI")
		{
			document.getElementById('sim').style.display='none';
			document.getElementById('pri').style.display='block';
			
		}
		else if(document.getElementById('rr').value=="SIM")
		{
			document.getElementById('pri').style.display='none';
			document.getElementById('sim').style.display='block';
		}
	}

</script>
		

<?php
include('footer.php');
?>