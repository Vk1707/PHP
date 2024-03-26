<?php
include('header.php');

?>
<?php


if(isset($_POST['save']))
{
 
			$pri_number =$_POST['pri_no'];
			$owner_name = $_POST['owner_name'];
			
			$process_name=$_POST['process_name'];
			$activation_date = $_POST['act_dd'];
			$allocation_date = $_POST['alloc_dd'];
			$gateway_ip = $_POST['ip'];
			$port = $_POST['port'];
			$in_out= $_POST['in_out'];
			$billing_to = $_POST['billing_to'];
			$dnc_ndnc=$_POST['dnc_ndnc'];
			$dialer= $_POST['dialer'];
			$prefix = $_POST['pre'];	
    		$sn=$_GET['id'];
    		$sno=explode('_', $sn);
    		$sr_no=$sno[2];


			$sql2="UPDATE `pri_tracker` SET `updated_thrg`='Manually',`pri_number`='$pri_number',`owner_name`='$owner_name',`activation_date`='$activation_date',`allocation_date`='$allocation_date',`gateway_ip`='$gateway_ip',`port`='$port',`in_out`='$in_out',`billing_to`='$billing_to',`dnc_ndnc`='$dnc_ndnc',`dialer`='$dialer',`prefix`='$prefix' WHERE sr_no ='$sr_no'";



			$res2 = mysqli_query($conn,$sql2);

			if($res2==true)
			{
				
				echo "<script> alert('Data Updated Successfully!');location.href='view_pri_tracker.php';</script>";

				
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
				 	<h2 class="text-center float-left" style="color:#0A1551">PRI Tracker Manual Updation</h2><br>
		
				 	<hr size="8" width="100%" color="#23262C"><br>
				 
				 		 <div class="form-group row">
				 				
				 				 <div class="col-lg-3 ">
				 					   
									<label style="color:#0A1551;margin-left:50px;">PRI Number</label>
								  </div>

									<div class="col-lg-6">
									<input type="text"  style="display:inline-block; width:400px; " name="pri_no" class="form-control" required>
							   </div>
						</div>

						 <div class="form-group  row ">
							    <div class="col-lg-3 ">
											<label style="margin-left:50px; color:#0A1551">Process Name</label>
									</div>
									<div class="col-lg-6">

							<input type="text" name="process_name" style="display:inline-block; width:400px;"
										 
										 value="<?php echo $_GET['pn'] ;?>" class="form-control" readonly>
								  			 
  									
  								</div>
  						</div>
  						 			
				 			<div class="form-group  row ">
				 				<div class="col-lg-3 ">
										<label style="margin-left:50px;color:#0A1551">Gateway IP</label>
								</div>
								<div class="col-lg-6">

										<input type="text" style="display:inline-block; width:400px;" name="ip" class="form-control" required>
								 </div>
							</div>
							<div class="form-group  row ">
								<div class="col-lg-3">
										<label style="margin-left:50px;color:#0A1551">Port</label>
								</div>
								<div class="col-lg-6">
										<input type="text"  style="display:inline-block; width:400px;" name="port" class="form-control" required>
						   </div>
						  </div>
				

				<div class="form-group row">
				 		<div class="col-lg-3">	
				 				
				 			<label style="margin-left:50px;color:#0A1551">Activation Date</label>
						</div>
						<div class="col-lg-6">

									<input type="date"  style="display:inline-block; width:400px;" name="act_dd" class="form-control" required>
					 </div>
				</div>

					<div class="form-group row">
								<div class="col-lg-3">	
										<label style="margin-left:50px;color:#0A1551">Allocation Date</label>
								</div>
								<div class="col-lg-6">
									<input type="date"  style="display:inline-block; width:400px" name="alloc_dd" class="form-control" required>
					   	</div>
					 </div>
					
								
			
				<div class="form-group row">
				 				 <div class="col-lg-3">	
				 							<label style="margin-left:50px;color:#0A1551">In/Out</label>
				 					</div>
									<div class="col-lg-6">
										<select name="in_out" style="display:inline-block; width:400px;" class="form-control" required>
								  		 <option value="" hidden>Click to choose.....</option>
											 <option value="In">IN</option>
											 <option value="Out">OUT</option>
										</select>
									</div>
						</div>

						<div class="form-group row">
								<div class="col-lg-3">	
										<label style="margin-left:50px;color:#0A1551">Owner Name</label>
								</div>
								<div class="col-lg-6">
						<select name="owner_name" style="width: 400px;" class="form-control" required>
							<option value="" hidden>Click to Choose....</option>
							<option value="Airtel">Airtel</option>
							<option value="Vodafone"> Vodafone</option>
							<option value="Tata">TATA </option>
						</select>

								</div>
				  			</div>

				  <div class="form-group row">
								<div class="col-lg-3">	
										<label style="margin-left:50px;color:#0A1551">Billing To</label>
								</div>
								<div class="col-lg-6">
										<select name="billing_to" style="display:inline-block; width:400px;" class="form-control" required>
								  		 <option value="" hidden>Click to choose.....</option>
											 <option value="Silaris">Silaris</option>
											 <option value="Client">Client</option>
											 
									</select>
						</div>
				  </div>
			
				
				<div class="form-group row">
				 				<div class="col-lg-3">
									<label style="margin-left:50px;color:#0A1551">DNC/NDNC</label>
								</div>
								<div class="col-lg-6">	
									<select name="dnc_ndnc" style="display:inline-block; width:400px;" class="form-control" required>
								  		 <option value="" hidden>Click to choose.....</option>
											 <option value="DNC">DNC</option>
											 <option value="NDNC">NDNC</option>
											
									</select>
								 </div>
				     </div>
				        <div class="form-group row">
				        	 <div class="col-lg-3">
											<label style="margin-left:50px;color:#0A1551">Dialer</label>
									 </div>
									 <div class="col-lg-6">
											<select name="dialer" style="display:inline-block; width:400px;" class="form-control" required>
								  		 <option value="" hidden>Click to choose.....</option>
											 <option value="Cohesive">Cohesive</option>
											 <option value="Drishti">Drishti</option>
											 <option value="C-Zentrix">C-Zentrix</option>
											</select>
								   </div>
				        </div>
				   
				<div class="form-group row">
							
				 				 <div class="col-lg-3">
										<label style="margin-left:50px;color:#0A1551">Prefix</label>
									</div>
									<div class="col-lg-6">
									     <input type="text"  style="display:inline-block; width:400px" name="pre" class="form-control" required>
					      </div>
				</div>
					
			<br>
			
				<div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="save" value="UPDATE">
    		   </div>


			
		
	
<?php
include('footer.php');
?>