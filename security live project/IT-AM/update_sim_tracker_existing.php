<?php
include('header.php');

?>
<?php


if(isset($_POST['save']))
{
 
			$sim_number =$_POST['sim_no'];
			$mobile =$_POST['mobile'];
			
			$activation_date = $_POST['act_dd'];
			$allocation_date = $_POST['alloc_dd'];
			$gateway_ip = $_POST['ip'];
			$port = $_POST['port'];
			
    		$sn=$_GET['id'];
    		$sno=explode('_', $sn);
    		$sr_no=$sno[2];


			$sql2="UPDATE `sim_tracker` SET `sr_no`='$sr_no',`mobile_number`='$mobile',`sim_number`='$sim_number',`gateway_ip`='$gateway_ip',`port`='$port',`activation_date`='$activation_date',`allocation_date`='$allocation_date' WHERE sr_no ='$sr_no'";



			$res2 = mysqli_query($conn,$sql2);

			if($res2==true)
			{
				
				echo "<script> alert('Data Updated Successfully!');location.href='view_sim_tracker.php';</script>";

				
			}
			else
			{
				echo "<script> alert('PRI Number Already Exist')</script>";
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
			      </li> -->
			     <!-- <li class="nav-item">
			        <a class="nav-link" href="#">ISMS Policies</a>
			      </li> -->
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navbardrop"><i class="fa fa-user-circle"></i> <?php echo $adname?></a>
			         <div class="dropdown-menu">
				        <a class="dropdown-item" href="profile.php"> <i class="fa fa-user"></i> Profile</a>
				        <a class="dropdown-item" href="agent_change_password.php"><i class="fa fa-lock"></i>Password</a>
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
				 	<h2 class="text-center float-left" style="color:#0A1551">SIM Tracker Manual Updation</h2><br>
		
				 	<hr size="8" width="100%" color="#23262C"><br>
				 
				 		 <div class="form-group row">
				 				
				 				 <div class="col-lg-3 ">
				 					   
									<label style="color:#0A1551;margin-left:50px;">SIM Number</label>
								  </div>

									<div class="col-lg-6">
									<input type="text"  style="display:inline-block; width:300px; " name="sim_no" class="form-control" required>
							   </div>
						</div>

						 <div class="form-group  row ">
							    <div class="col-lg-3 ">
											<label style="margin-left:50px; color:#0A1551">Mobile Number</label>
									</div>
									<div class="col-lg-6">

							<input type="text" name="mobile" style="display:inline-block; width:300px;" class="form-control" required>
								  			 
  									
  								</div>
  						</div>
						 <div class="form-group  row ">
							    <div class="col-lg-3 ">
											<label style="margin-left:50px; color:#0A1551">Process Name</label>
									</div>
									<div class="col-lg-6">

							<input type="text" name="process_name" style="display:inline-block; width:300px;"
										 
										 value="<?php echo $_GET['pn'] ;?>" class="form-control" readonly>
								  			 
  									
  								</div>
  						</div>
  						 			
				 			<div class="form-group  row ">
				 				<div class="col-lg-3 ">
										<label style="margin-left:50px;color:#0A1551">Gateway IP</label>
								</div>
								<div class="col-lg-6">

										<input type="text" style="display:inline-block; width:300px;" name="ip" class="form-control" required>
								 </div>
							</div>
							<div class="form-group  row ">
								<div class="col-lg-3">
										<label style="margin-left:50px;color:#0A1551">Port</label>
								</div>
								<div class="col-lg-6">
										<input type="text"  style="display:inline-block; width:300px;" name="port" class="form-control" required>
						   </div>
						  </div>
				

				<div class="form-group row">
				 		<div class="col-lg-3">	
				 				
				 			<label style="margin-left:50px;color:#0A1551">Activation Date</label>
						</div>
						<div class="col-lg-6">

									<input type="date"  style="display:inline-block; width:300px;" name="act_dd" class="form-control" required>
					 </div>
				</div>

					<div class="form-group row">
								<div class="col-lg-3">	
										<label style="margin-left:50px;color:#0A1551">Allocation Date</label>
								</div>
								<div class="col-lg-6">
									<input type="date"  style="display:inline-block; width:300px" name="alloc_dd" class="form-control" required>
					   	</div>
					 </div>
				
			
					
			<br>
			
				<div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="save" value="UPDATE">
    		   </div>


			
		
	
<?php
include('footer.php');
?>