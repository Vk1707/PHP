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
				
				<div class="col-lg-6 col-md-6">
				</div>
				<div class="col-lg-6 col-md-6">
					<form class="form-inline float-right" method="GET" action="">
						<input type="number" name="emid" class="form-control" placeholder="Employee ID (Only Number)">
						<input type="submit" class="btn btn-danger ml-2" value="Find">
					</form>
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Employee Name</td>
						<td>Employee ID</td>
						<td>Process</td>
						<td>Designation</td>
						<td>Reporting to</td>
						<td>Process Head</td>
						<td>Email ID</td>
						<td>Email Access</td>
						<td>Date & Time</td>
              			<td>HR Dept.</td>
						<td>Process / Dept. AVP / VP</td>
						<td>IT VP</td>
						<td>Email Support</td>
						<td>Status</td>
					</thead>
					<tbody>
						<?php
						if(isset($_GET['emid']))
						{

							$gid = $_GET['emid'];
							$num =1;
							$tsql = "SELECT * FROM `sc_emailcreation` WHERE sc_empid LIKE '%$gid%' AND sc_status='1'";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['sc_empname'];?></td>
									<td><?php echo $trow['sc_empid'];?></td>
									<td><?php echo $trow['sc_process'];?></td>
									<td><?php echo $trow['sc_designation'];?></td>
									<td><?php echo $trow['sc_reportingto'];?></td>
									<td><?php echo $trow['sc_processhead'];?></td>
									<td><?php echo $trow['sc_suggestemail'];?></td>
									<td><?php echo $trow['sc_existemail'];?></td>
									<td><?php echo $trow['sc_createdon'];?></td>
									<td><?php
									$hrid = $trow['sc_hrdepart']; 
									if($hrid == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$proav = $trow['sc_processavp']; 
									if($proav == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$itav = $trow['sc_itavp']; 
									if($itav == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$itdp = $trow['sc_itdepart']; 
									if($itdp == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$act = $trow['sc_action']; 
									if($act == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
								</tr>
								<?php
								$num++;
							}
						}
						else
						{
							$num =1;
							$tsql = "SELECT * FROM `sc_emailcreation` WHERE sc_status='1' AND `sc_action` IN ('0','1','2','3') AND sc_createdemail='$ademail'";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['sc_empname'];?></td>
									<td><?php echo $trow['sc_empid'];?></td>
									<td><?php echo $trow['sc_process'];?></td>
									<td><?php echo $trow['sc_designation'];?></td>
									<td><?php echo $trow['sc_reportingto'];?></td>
									<td><?php echo $trow['sc_processhead'];?></td>
									<td><?php echo $trow['sc_suggestemail'];?></td>
									<td><?php echo $trow['sc_existemail'];?></td>
									<td><?php echo $trow['sc_createdon'];?></td>
									<td><?php
									$hrid = $trow['sc_hrdepart']; 
									if($hrid == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$proav = $trow['sc_processavp']; 
									if($proav == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$itav = $trow['sc_itavp']; 
									if($itav == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$itdp = $trow['sc_itdepart']; 
									if($itdp == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$act = $trow['sc_action']; 
									if($act == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
								</tr>
								<?php
								$num++;
							}
						}
						?>
						<tr>
							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	

<?php
include('footer.php');
?>	