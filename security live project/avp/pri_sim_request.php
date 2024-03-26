<?php
include('header.php');
include ('../emailconfig_pri.php');

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
			        <a class="nav-link" href="isms-topics.php">ISMS Topics</a>
			      </li>
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

			<div class="row mb-4">
				<div class="col-lg-6 col-md-6">
					<a href="avp_pri_history.php" class="btn btn-warning"><i class="fa fa-history"></i> History</a>
				</div>
				
									
			</div>
			
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th>S.No</th>
						<th>Request Date</th>		
						<th>Request Raised By</th>
						
						<th>Requester Designation</th>
						<th>Process</th>
						<th>Requirement</th>
						<th>Type of SIM Required</th>
						<th>Required SIM Count</th>
						<th>Type of PRI Required</th>
						<th>Required PRI Count </th>
									
						<th>Cost Center</th>
						
						<th>Request Reason</th>
						<th>Your Previous Feedback</th>
						<th>Feedback</th>

					
						
					</thead>
					<tbody>
						<?php
						
							$tsql = "SELECT * FROM `pri_sim_request` where avp_emailid='$ademail' AND (avp_feedback='' OR avp_feedback='On Hold') order by sr_no desc";
							$tres=mysqli_query($conn,$tsql);
							$num=1;
							while($trow = mysqli_fetch_array($tres))
							{
								
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['request_date'];?></td>
									<td><?php echo $trow['emp_name'];?></td>
									
									<td><?php echo $trow['designation'];?></td>
									<td><?php echo $trow['process_name'];?></td>
									<td><?php echo $trow['requirement'];?></td>
									<td><?php echo $trow['sim_details'];?></td>
									
									<td><?php echo $trow['sim_count'];?></td>
									<td><?php echo $trow['pri_140_details'];?></td>
									<td><?php echo $trow['pri_140_count'];?></td>
								
									<td><?php echo $trow['cost_center'];?></td>
									<td><?php echo $trow['pri_req_reason'];?></td>
									
									<td><strong> <?php echo  $trow['avp_feedback'];?> </strong></td>
									<td><a href="avp_pri_feedback.php?id=<?php echo $trow['ticket_no'];?>" > Click to Give Feedback</a></td>
									
								</tr>
								<?php
							
							$num++;
							
							}
						?>
						<tr> 
							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	</div>
</div>
<?php
include('footer.php');
?>