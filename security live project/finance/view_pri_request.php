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
						<th>Type of PRI required</th>
						<th>Required PRI Count</th>
								
						<th>Cost Center</th>
						
						<th>Existing PRI-140 Count</th>
              			<th>Existing Normal PRI Count</th>
              			<th>Existing SIM Count</th>
              			<th>PRI Request Reason</th>
					
						<th>AVP Feedback</th>
						<th>AVP Comments</th>
						<th>CIO Feedback</th>
						<th>CIO Comments</th>
						<th>CEO Feedback</th>
						<th>CEO Comments</th>
						<th>Download</th>
					
						
					</thead>
					<tbody>
						<?php
						
							$tsql = "SELECT * FROM `pri_sim_request` where ceo_feedback='Approved' order by sr_no desc";
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
									
									 <td><?php echo $trow['existing_pri140_count'];?></td>
                                    <td><?php echo $trow['existing_normal_pri_count'];?></td>
                                    <td><?php echo $trow['existing_sim_count'];?></td>
                                    <td><?php echo $trow['pri_req_reason'];?></td>
									<td><strong> <?php echo  $trow['avp_feedback'];?> </strong></td>
									<td> <?php echo  $trow['avp_comments'];?> </td>
									<td><strong> <?php echo  $trow['cio_feedback'];?> </strong></td>
									<td> <?php echo  $trow['cio_comments'];?></td>
									<td><strong> <?php echo  $trow['ceo_feedback'];?> </strong></td>
									<td> <?php echo  $trow['ceo_comments'];?></td>
									<td><a href="pri_download.php?id=<?php echo $trow['ticket_no']?>"><i class="fa fa-download"> </i> </a></td>
									
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