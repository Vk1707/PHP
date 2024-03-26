<?php
include('header.php');

?>
<?php

if(isset($_POST['save']))
{
 
			$pri_number =$_POST['pri_no'];
			$owner_name = $_POST['owner_name'];
			$type = $_POST['pri_type'];
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
    

    	$sql1="select * from pri_tracker";
			$res1 = mysqli_query($conn,$sql1);
			$count=mysqli_num_rows($res1);
			if ($count==0)
				{
					$sr_no=1;
					}
			else
				{
					$sr_no=$count+1;
				}


			$sql2="INSERT INTO `pri_tracker`(`sr_no`,`updated_thrg`,`pri_number`, `owner_name`, `type`, `process_name`, `activation_date`, `allocation_date`, `gateway_ip`, `port`, `in_out`, `billing_to`, `dnc_ndnc`, `dialer`, `prefix`) VALUES ('$sr_no','Manually','$pri_number','$owner_name','$type','$process_name','$activation_date','$allocation_date','$gateway_ip','$port','$in_out','$billing_to','$dnc_ndnc','$dialer','$prefix')";



			$res2 = mysqli_query($conn,$sql2);

			if($res2==true)
			{
				echo "<script> alert('Data Saved Successfully!')</script>";
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

										<select name="process_name" style="display:inline-block; width:400px;" class="form-control" required>
								  			 <option value="" hidden> Click to choose.....</option>
											 <option value="HDFC ERGO">HDFC ERGO</option>
			  								 <option value="MAX LIFE">MAX LIFE</option>
			  								 <option value="AMEX EDM">AMEX EDM</option>
			  								  <option value="TATA AIA">TATA AIA</option>
			  								 <option value="SBI FLEXI">SBI FLEXI</option>
			  								 <option value="SBI ENCASH">SBI ENCASH </option>
			  								 <option value="SBI UPGRADE">SBI UPGRADE</option>
			  								 <option value="SBI ADD ON">SBI ADD ON</option>
			  								 <option value="SBI CPP TM">SBI CPP TM</option>
			  								 <option value="VOLTAS">VOLTAS</option>
			  								 <option value="IHO,puneet">IHO</option>
			  								  <option value="SKYWORTH">SKYWORTH</option>
			  								 <option value="SBI BT">SBI BT</option>
			  								 <option value="RSA">RSA</option>
			  								 <option value="HSBC">HSBC</option>
			  								 <option value="HSBC CANARA">HSBC CANARA</option>
			  								 <option value="CPP POS">CPP POS</option>
			  								 
  									</select>
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
										<select name="owner_name" style="display:inline-block; width:400px;" class="form-control" required>
								  		 <option value="" hidden>Click to choose.....</option>
											 <option value="Airtel">Airtel</option>
											 <option value="Tata">TATA</option>
											 <option value="Vodafone">Vodafone</option>
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
					<div class="form-group row">	
							<div class="col-lg-3">
									<label style="margin-left:50px;color:#0A1551">Type</label>
							</div>
							<div class="col-lg-6">
									<select name="pri_type" style="display:inline-block; width:400px;"  class="form-control" required>
								  		 <option value="" hidden>Click to choose.....</option>
											 <option value="PRI-140">PRI-140</option>
											 <option value="PRI-Normal">PRI-Normal</option>
						 
									</select>
							</div>
					</div>
			<br>
			
				<div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="save" value="SAVE">
    		   </div>


			
		
	
<?php
include('footer.php');
?>