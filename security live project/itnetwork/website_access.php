<?php
include('header.php');
include ('../emailconfig.php');

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
			      <li class="nav-item">
			        <a class="nav-link" href="isms-policies.php">ISMS Policies</a>
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
					<a href="network_website_history.php" class="btn btn-warning"><i class="fa fa-history"></i> History</a>
				</div>
				
									
			</div>
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Website_Access_ID</td>		
						<td>Created_On</td>
						<td>Created By</td>
						<td>Process / Dept.</td>
						<td>Access Required For</td>
						<td>Process Manager Employee Id </td>
						<td>Process Manager Email Id</td>
						<td>Process AVP Name</td>
						<td>Process AVP Email Id</td>
						<td>Website Requested</td>
						<td>Client Approval File</td>				
						<td>ISMS Feedback</td>
						<td>CEO Feedback</td>
						<td>Whitelisting Status</td>
					
						
					</thead>
					<tbody>
						<?php
						
						   $tsql = "SELECT * FROM `website_access` WHERE isms_status='1' AND ceo_status='1' AND network_status='0' order by access_id desc";
							$tres = mysqli_query($conn,$tsql);
							$num=1;
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['access_id'];?></td>
									<td><?php echo $trow['request_date'];?></td>
									<td><?php echo $trow['process_manager_name'];?></td>
									<td><?php echo $trow['process_name'];?></td>
									<td><?php echo $trow['access_req_for'];?></td>
									<td><?php echo $trow['manager_emp_id'];?></td>
									<td><?php echo $trow['manager_email_id'];?></td>
									
									<td><?php echo $trow['avp_name'];?></td>
									<td><?php echo $trow['avp_emailid'];?></td>
									<td><?php echo $trow['website_name'];?></td>
									<?php $filename= $trow['client_approval_file'];?>
									<td>
										<?php if(empty($filename))
										{
											echo "No file attached";
										}
										 
										else if (isset($filename))
										{echo "<a href= '../uploads/$filename'> Show </a> ";}
										?>

									</td>
									<td><?php echo $trow['isms_feedback'];?></td>
									<td><?php echo $trow['ceo_feedback'];?></td>
									<td>
										
											<a href="network_action.php?id=<?php echo $trow['access_id']; ?>"> Action </a>

									</td>
									
									

									
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