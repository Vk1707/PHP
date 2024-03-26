<?php
include('header.php');

?>
<?php


if(isset($_POST['save']))
{
 
				
			$p=$_SESSION['process_name'];
			
			$email=$_SESSION['avp_emailid'];
			
			$avp_name=	$_SESSION['avp_name'];

			$rec_date =$_POST['rec_date'];
			$pri_count =$_POST['count'];
			$type =$_POST['type'];
			$sql1="SELECT * FROM `pri_tracker`";
			$res1= mysqli_query($conn,$sql1);
			$count=mysqli_num_rows($res1);

			$sr_no=$count+1;
			$pri="Temp_no._".$sr_no;
		
			for($i=1;$i<=$pri_count;$i++)
		{
				$sql2="INSERT INTO `pri_tracker`(`sr_no`, `provided_by`, `client_pri_rec_date`, `request_date`, `updated_thrg`, `pri_number`, `owner_name`, `type`, `process_name`,`avp_email`, `activation_date`, `allocation_date`, `gateway_ip`, `port`, `in_out`, `billing_to`, `dnc_ndnc`, `dialer`, `prefix`) VALUES ('$sr_no','Provided By Client','$rec_date','','Manually','$pri','Not Updated','$type','$p','$email','','','Not Updated','Not Updated','Not Updated','Not Updated','Not Updated','Not Updated','Not Updated')";

				$res2 = mysqli_query($conn,$sql2);
	
    		$sr_no=$sr_no+1;
    		$pri="Temp_no._".$sr_no;
   
    	 }
				
			if ($res2==true)
			{
					echo "<script> alert('Information Saved Successfully!');location.href='view_pri_tracker.php';</script>";
			}
			else
			{

				echo "<script> alert('Information Not Saved, Try Again!');location.href='client_pri_process.php';</script>";
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
				 	<h2 class="text-center float-left" style="color:#0A1551">Client Provided PRI </h2><br>
		
				 	<hr size="8" width="100%" color="#23262C"><br>
				 
				 		

						 <div class="form-group  row ">
							    <div class="col-lg-3 ">
											<label style="margin-left:50px; color:#0A1551">PRI Receiving Date</label>
									</div>
									<div class="col-lg-6">

							<input type="date" name="rec_date" style="display:inline-block; width:200px;" class="form-control" required>
								  			 
  									
  								</div>
  						</div>
  						 			
				 			<div class="form-group  row ">
				 				<div class="col-lg-3 ">
										<label style="margin-left:50px;color:#0A1551">Received PRI Count</label>
								</div>
								<div class="col-lg-6">

										<input type="text" style="display:inline-block; width:200px;" name="count" class="form-control" required>
								 </div>
							</div>
						<div class="form-group  row ">
				 				<div class="col-lg-3 ">
										<label style="margin-left:50px;color:#0A1551">Type of PRI Received</label>
								</div>
								<div class="col-lg-6">

										<select name="type" class="form-control" style="display:inline-block; width:200px;"required>
								  				 <option value="" hidden> Click to choose.....</option>
											 			<option value="PRI-140">PRI-140</option>
			  								 		<option value="PRI-Normal">PRI-Normal</option>
			  						</select>
								 </div>
							</div><br>
				<div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="save" value="SAVE">
    		   </div>
<?php
include('footer.php');
?>