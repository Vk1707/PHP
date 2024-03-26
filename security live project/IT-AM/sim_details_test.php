<?php
include('header.php');


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

			<!-- <?php echo $_GET['id']; ?> -->
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive" >
				<table class="table table-bordered table-striped table-hover">
					<h2 class="text-center float-left" style="color:#0A1551">SIM Tracker</h2><br>
			  <hr size="8" width="100%" color="#23262C">

			 
	
			<form class="" method="POST" action="" enctype="multipart/form-data">
			
				<div class="container">
					
						
				<div class="row" >

					
							<label><font color="#0A1551"> Filter</font> </label>
							<select id="choice" style="margin-left:10px;margin-right:100px;" onchange="myfunc()" required >
					 
								 <option value="all" selected>All</option>
  								 <option value="client">Client Provided SIM</option>
  								 <option value="silaris">Silaris SIM</option>
  							</select>
  					  
  				<?php
  				 $pn=$_GET['id'];
  				$tsql1 = "SELECT count(*) as count FROM `sim_tracker` where process='$pn'";
							$tres1=mysqli_query($conn,$tsql1);
							$row1=mysqli_fetch_array($tres1);
							$c1=$row1['count']
							?>

							<label><font color="#0A1551"> Count</font> </label>
							<input  type="text" name="count" style="width:50px;margin-left: 10px;" value="<?php echo $c1;?>" readonly>
  				  </div>     
				</div>
			</div>
			
			</form><br>
	
					<thead class="bgsky">
						<th>S.No</th>
						<th>SIM Provided By</th>
						<th>SIM Receiving Date(for Client provided SIMs)</th>
						<th>SIM Request Received On(for Silaris Provided SIMs)</th>
						<th>SIM Number</th>	
						<th>Mobile Number</th>	
						<th>SIM Type</th>
						<th>Process Name</th>
						<th>Activation Date</th>
						<th>Allocation Date</th>
						<th>Gateway IP</th>
						<th>Port</th>		
						<th>Updated Via</th>
						
						
					</thead>
				<div id="q1">	
					<tbody >
						

						<?php
						    
						  
							$tsql = "SELECT * FROM `sim_tracker` where process='$pn' order by sr_no desc";
							$tres=mysqli_query($conn,$tsql);


							$num=1;
							while($trow = mysqli_fetch_array($tres))
							{
								
								?>
								<tr>

									<td><?php echo $num;?></td>
									
									<td><?php echo $trow['provided_by'];?></td>
									<td><?php echo $trow['received_on'];?></td>
									<td><?php echo $trow['request_date'];?></td>

									
									<?php
									if ($trow['mobile_number']=="Not Updated")
									{ ?>
										<td><?php 

										$p=$trow['sim_number'];
										$pn=$trow['process'];
										echo $p; ?><br><a href='update_sim_tracker_existing.php?id=<?php echo $p?>&pn=<?php echo $pn;?>'>Click here to Update</td>
									<?php 		
									}

									else
									{

									?>
									<td><?php echo $trow['sim_number'];?></td>

									<?php } ?>
									
									<?php 
									if($trow['mobile_number']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['mobile_number'];?></font></td>
									<?php } 
									else{
									?>
									<td><?php echo $trow['mobile_number'];?></td>
									<?php } ?>
									<td><?php echo $trow['sim_type'];?></td>
									<td><?php echo $trow['process'];?></td>
								 <?php 
								   if($trow['activation_date']=="0000-00-00")
									{?>
									<td><font color="red"><?php echo $trow['activation_date'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['activation_date'];?></td>
								     <?php } 
									 if($trow['allocation_date']=="0000-00-00")
									{?>
									<td><font color="red"><?php echo $trow['allocation_date'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['allocation_date'];?></td>
								     <?php } 
									 if($trow['gateway_ip']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['gateway_ip'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['gateway_ip'];?></td>
								     <?php } 
									if($trow['port']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['port'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['port'];?></td>
								     <?php } ?>
									<td><?php echo $trow['updated_thrg'];?></td>
									 
								
									
								</tr>
								<?php
							
							$num++;
							
							}
						?>
						<tr> 
							
						</tr>
					</tbody>
				</div>
				 <div id="q2">
				 		<tbody >
						

						<?php
						    
						  
							$tsql = "SELECT * FROM `sim_tracker` where process='$pn' AND (provided_by='Provided by Client' OR provided_by='Client')order by sr_no desc";
							$tres=mysqli_query($conn,$tsql);


							$num=1;
							while($trow = mysqli_fetch_array($tres))
							{
								
								?>
								<tr>

									<td><?php echo $num;?></td>
									
									<td><?php echo $trow['provided_by'];?></td>
									<td><?php echo $trow['received_on'];?></td>
									<td><?php echo $trow['request_date'];?></td>

									
									<?php
									if ($trow['mobile_number']=="Not Updated")
									{ ?>
										<td><?php 

										$p=$trow['sim_number'];
										$pn=$trow['process'];
										echo $p; ?><br><a href='update_sim_tracker_existing.php?id=<?php echo $p?>&pn=<?php echo $pn;?>'>Click here to Update</td>
									<?php 		
									}

									else
									{

									?>
									<td><?php echo $trow['sim_number'];?></td>

									<?php } ?>
									
									<?php 
									if($trow['mobile_number']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['mobile_number'];?></font></td>
									<?php } 
									else{
									?>
									<td><?php echo $trow['mobile_number'];?></td>
									<?php } ?>
									<td><?php echo $trow['sim_type'];?></td>
									<td><?php echo $trow['process'];?></td>
								 <?php 
								   if($trow['activation_date']=="0000-00-00")
									{?>
									<td><font color="red"><?php echo $trow['activation_date'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['activation_date'];?></td>
								     <?php } 
									 if($trow['allocation_date']=="0000-00-00")
									{?>
									<td><font color="red"><?php echo $trow['allocation_date'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['allocation_date'];?></td>
								     <?php } 
									 if($trow['gateway_ip']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['gateway_ip'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['gateway_ip'];?></td>
								     <?php } 
									if($trow['port']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['port'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['port'];?></td>
								     <?php } ?>
									<td><?php echo $trow['updated_thrg'];?></td>
									 
								
									
								</tr>
								<?php
							
							$num++;
							
							}
						?>
						<tr> 
							
						</tr>
					</tbody>
				</div>
				<div id="q3">
					<tbody >
						

						<?php
						    
						  
							$tsql = "SELECT * FROM `sim_tracker` where process='$pn' AND (provided_by='Provided by Silaris' OR provided_by='Silaris') order by sr_no desc";	
							$tres=mysqli_query($conn,$tsql);


							$num=1;
							while($trow = mysqli_fetch_array($tres))
							{
								
								?>
								<tr>

									<td><?php echo $num;?></td>
									
									<td><?php echo $trow['provided_by'];?></td>
									<td><?php echo $trow['received_on'];?></td>
									<td><?php echo $trow['request_date'];?></td>

									
									<?php
									if ($trow['mobile_number']=="Not Updated")
									{ ?>
										<td><?php 

										$p=$trow['sim_number'];
										$pn=$trow['process'];
										echo $p; ?><br><a href='update_sim_tracker_existing.php?id=<?php echo $p?>&pn=<?php echo $pn;?>'>Click here to Update</td>
									<?php 		
									}

									else
									{

									?>
									<td><?php echo $trow['sim_number'];?></td>

									<?php } ?>
									
									<?php 
									if($trow['mobile_number']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['mobile_number'];?></font></td>
									<?php } 
									else{
									?>
									<td><?php echo $trow['mobile_number'];?></td>
									<?php } ?>
									<td><?php echo $trow['sim_type'];?></td>
									<td><?php echo $trow['process'];?></td>
								 <?php 
								   if($trow['activation_date']=="0000-00-00")
									{?>
									<td><font color="red"><?php echo $trow['activation_date'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['activation_date'];?></td>
								     <?php } 
									 if($trow['allocation_date']=="0000-00-00")
									{?>
									<td><font color="red"><?php echo $trow['allocation_date'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['allocation_date'];?></td>
								     <?php } 
									 if($trow['gateway_ip']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['gateway_ip'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['gateway_ip'];?></td>
								     <?php } 
									if($trow['port']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['port'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['port'];?></td>
								     <?php } ?>
									<td><?php echo $trow['updated_thrg'];?></td>
									 
								
									
								</tr>
								<?php
							
							$num++;
							
							}
						?>
						<tr> 
							
						</tr>
					</tbody>
				</div>
				</table>
			</div>
		</div>
	</div>

	</div>
</div>

<script type="text/javascript">
	
function myfunc()
{
 if(document.getElementById('choice').value=="all")
 {
 	//document.getElementById('q1').disabled=false;
 	document.getElementById('q2').style.visibility="hidden";
 	document.getElementById('q3').style.visibility="hidden";
 }
 else if(document.getElementById('choice').value=='client');
 {
 	document.getElementById('q1').style.visibility="hidden";
 	//document.getElementById('q2').disabled=false;
 	document.getElementById('q3').style.visibility="hidden";
 }
  else if(document.getElementById('choice').value=='silaris')
 {
 	document.getElementById('q1').style.visibility="hidden";
 	document.getElementById('q2').style.visibility="hidden";
 	//document.getElementById('q3').disabled=false;
 }
}



</script>
<?php
include('footer.php');
?>