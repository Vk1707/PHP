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
				
				<div class="col-lg-12 col-md-12">
					
						<a href="export.php" class="btn btn-info float-right" id="addform"> <i class="fa fa-download"> </i> Report Download</a>
						
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Ticket ID</td>
						<td>Date || Time</td>
						<td>Name</td>
						<td>Email ID</td>
						<td>Process</td>
						<td>Main Incident</td>
						<td>Sub Incident</td>
						<td>Details</td>
						<td>Solution</td>
						<td>Data || Time</td>
						<td>Status</td>
						
					</thead>
					<tbody>
						<?php
						$tnum = 1;
									$ttsql = "SELECT * FROM `sc_security` WHERE sc_status IN ('1','2') ORDER BY sc_sno DESC";
								$ttres = mysqli_query($conn,$ttsql);
								while($ttrow = mysqli_fetch_array($ttres))
								{
									?>
									<tr>
										<td><?php echo $tnum;?></td>
										<td><?php echo $ttrow['sc_ticketid'];?></td>
										<td><?php echo $ttrow['sc_createdon'];?></td>
										<td><?php echo $ttrow['sc_name'];?></td>
										<td><?php echo $ttrow['sc_emailid'];?></td>
										<td><?php echo $ttrow['sc_emprocss'];?></td>
										<td><?php echo $ttrow['sc_mainpage'];?></td>
										<td><?php echo $ttrow['sc_subpage'];?></td>
										<td><?php echo $ttrow['sc_details'];?></td>
										<td><?php echo $ttrow['sc_solution'];?></td>
										<td><?php echo $ttrow['sc_solutionat'];?></td>
										<?php 
										$melt = $ttrow['sc_status'];
										switch($melt)
										{
											case"1":
											echo "<td>Pending</td>";
											break;
											case"2":
											echo "<td>Complete</td>";
											break;

										}

										?>
										
									</tr>
									<?php
									$tnum++;
								}

						?>
					</tbody>
					</table>
			</div>
		</div>
	</div>

<?php
include('footer.php');
?>