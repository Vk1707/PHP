<?php
include('header.php');
include ('../emailconfig_pri.php');
date_default_timezone_set('Asia/Kolkata');

?>

<?php 



if(isset($_POST['sub']))
{
 		 	$pri_no=$_GET['p'];
			
			$raised_by =$_POST['raised_by'];
			$move_date= $_POST['move_date'];
			$move_from= $_POST['move_from'];
			$move_to=$_POST['move_to'];
			$ip= $_POST['ip'];
			$port = $_POST['port'];
			$prefix= $_POST['pre'];
			$new_ip= $_POST['new_ip'];
			$new_port = $_POST['new_port'];
			$new_prefix= $_POST['new_pre'];
			

    	$sql1="select * from pri_movement";
			$res1 = mysqli_query($conn,$sql1);
			$count=mysqli_num_rows($res1);
		
		    $sr_no=$count+1;
				
			

			$sql2="INSERT INTO `pri_movement`(`sr_no`, `pri_number`, `move_date`, `requester_name`, `moved_from`, `moved_to`, `gateway_ip`, `port`, `prefix`,`new_gateway_ip`, `new_port`, `new_prefix`) VALUES ('$sr_no','$pri_no','$move_date','$raised_by','$move_from','$move_to','$ip','$port','$prefix','$new_ip','$new_port','$new_prefix')";



			$res2 = mysqli_query($conn,$sql2);

			if($res2==true)
			{
				
				echo "<script> alert('PRI Moved Successfully!');location.href='view_pri_tracker.php';</script>";

				
			}
			else
			{
				echo "<script> alert('PRI Not Moved!');location.href='view_pri_tracker.php';</script>";


			}


			$sql3="UPDATE `pri_tracker` SET `process_name`='$move_to',`gateway_ip`='$ip',`port`='$port',`prefix`='$prefix' WHERE pri_number='$pri_no'";
			$res3 = mysqli_query($conn,$sql3);


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
			<?php include('sidebar.php'); ?>
		</div>
			<?php
				       $p=$_GET['p'];
							
							$sql1 = "SELECT * from pri_tracker WHERE pri_number='$p'";
							$res1 = mysqli_query($conn,$sql1);
							$row1= mysqli_fetch_array($res1);
						    if($row1==true)
								{
									$pn=$row1['process_name'];
									$ip=$row1['gateway_ip'];
									$port=$row1['port'];
									$prefix=$row1['prefix'];
									
								 }
									
					 	  
					?>

		<div class="body-dash">
			<form class="" method="POST" action="" enctype="multipart/form-data">
			
				<div class="container">
					<div class="jumbotron ">
						<h3 class="float-left" style="color:#0A1551"> Move PRI </h3> <br>
						<hr size="8" width="100%" color="#23262C"><br>

					
				<div class="form-group row">
				 				
				 				 <div class="col-lg-3 ">
				 					   
									<label style="color:#0A1551;margin-left:50px;">PRI Number</label>
								  </div>

									<div class="col-lg-6">
									<input type="text"  style="display:inline-block; width:400px;" value="<?php echo $p ;?>" class="form-control" readonly>
							   </div>
				</div>



					<div class="form-group row">
				 				
				 				 <div class="col-lg-3 ">
				 					   
									<label style="color:#0A1551;margin-left:50px;">Request Raised By</label>
								  </div>

									<div class="col-lg-6">
									<input type="text"  style="display:inline-block; width:400px; " name="raised_by" class="form-control" required>
							   </div>
						</div>
				<div class="form-group row">
				 				
				 				 <div class="col-lg-3 ">
				 					   
									<label style="color:#0A1551;margin-left:50px;">Moved On</label>
								  </div>

									<div class="col-lg-6">
									<input type="text"  style="display:inline-block; width:400px; " name="move_date" class="form-control" value="<?php echo date('d-m-y h:i:s');;?>" readonly>
							   </div>
						</div>
							
					  
						<div class="form-group row">
				 				
				 				 <div class="col-lg-3 ">
				 					   
									<label style="color:#0A1551;margin-left:50px;">Move From </label>
								  </div>
								  
									<div class="col-lg-3">
									<input type="text"  style="display:inline-block; width:200px; " name="move_from" class="form-control" value="<?php echo $pn;?>" readonly>
							   </div>

							   <div> 
				 					   
									<label style="color:#0A1551;margin-left:50px;">Move To </label>
								  </div>

									
									<select name="move_to" style="display:inline-block; width:200px; margin-left:80px;" class="form-control" required>
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
                    							<?php
								$psql = "SELECT * FROM `new_processes`";
								$pres=mysqli_query($conn,$psql);
								$count=mysqli_num_rows($pres);
								if ($count!=0)
								{
								
								while($prow = mysqli_fetch_array($pres))
								{
									$pn1=$prow['process_name'];
									$avp=$prow['process_avp_name'];
									$avp_email=$prow['avp_email'];

									?>
								<option value="<?php echo $pn1;?>"><?php echo $pn1; ?></option>
								
								<?php 
							    } }


								?>
			  								 
  									</select>
							  
						</div>
					 	<div class="form-group row">
				 				
				 				 <div class="col-lg-3 ">
				 					   
									<label style="color:#0A1551;margin-left:50px;">Gateway IP</label>
								</div>

								<div class="col-lg-3">
									<input type="text"  style="display:inline-block; width:200px;" name="ip" class="form-control" value="<?php echo $ip;?>" readonly>
								</div>

									<div >
				 					   
									<label style="color:#0A1551;margin-left:45px">New Gateway IP</label>
								</div>

								
									<input type="text"  style="display:inline-block; width:200px;margin-left:32px" name="new_ip" class="form-control"  required>
							   
						</div>	
							<div class="form-group row">
				 				
				 				 <div class="col-lg-3 ">
				 					   
									<label style="color:#0A1551;margin-left:50px;">Port</label>
								</div>

								
									<input type="text"  style="display:inline-block; width:200px; margin-left:15px" name="port" class="form-control" value="<?php echo $port;?>" readonly>
							  

							  <div >
				 					   
									<label style="color:#0A1551;margin-left:75px">New Port</label>
								</div>

								
									<input type="text"  style="display:inline-block; width:200px;margin-left:80px" name="new_port" class="form-control"  required>
						</div>	
							<div class="form-group row">
				 				
				 				 <div class="col-lg-3 ">
				 					   
									<label style="color:#0A1551;margin-left:50px;">Prefix</label>
								</div>

								
									<input type="text"  style="display:inline-block; width:200px; margin-left:15px" name="pre" class="form-control" value="<?php echo $prefix;?>" readonly>


								  <div >
				 					   
									<label style="color:#0A1551;margin-left:75px">New Prefix </label>
								</div>

								
									<input type="text"  style="display:inline-block; width:200px;margin-left:70px" name="new_pre" class="form-control"  required>
							  
						</div>		
		
    		  <br><div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="sub" value="MOVE">
						
			</form>
			
		</div>

</div>


<?php
include('footer.php');
?>