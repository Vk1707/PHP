<?php
include('header.php');
?>
<?php
if(isset($_POST['submet']))
{
	$tid = $_GET['tid'];
	$solusn = htmlspecialchars($_POST['solusn']);

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	$gmt = "UPDATE `sc_security` SET `sc_status`='2',`sc_solution`='$solusn', `sc_solutionat`='$daytime', `sc_solutionby`='$adname' WHERE sc_ticketid='$tid'";
	$cres = mysqli_query($conn,$gmt);
	if($cres == true)
	{
		header('Location:view-tickets.php');
		exit();
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
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="resolve-ticket">
						<?php
							if(isset($_GET['tid']))
							{
								$tid = $_GET['tid'];
								$tsk = "SELECT * FROM `sc_security` WHERE sc_ticketid='$tid'";
								$trt = mysqli_query($conn,$tsk);
								$twt = mysqli_fetch_array($trt);
								?>
								<form class="" method="POST" action="">
								<table class="table table-bordered">
									<tr>
										<td>Employee Name</td>
										<td><?php echo $twt['sc_name'];?></td>
										<td>Email Address</td>
										<td><?php echo $twt['sc_emailid'];?></td>
										<td>Process</td>
										<td><?php echo $twt['sc_emprocss'];?></td>
									</tr>
									<tr>
										<td>Ticket ID</td>
										<td><?php echo $twt['sc_ticketid'];?></td>
										<td>Main Incident</td>
										<td><?php echo $twt['sc_mainpage'];?></td>
										<td>Sub Incident</td>
										<td><?php echo $twt['sc_subpage'];?></td>
									</tr>
									<tr>
										<td>Details</td>
										<td colspan="5"><?php echo $twt['sc_details'];?></td>
										
									</tr>
									<tr>
										<td>Solution</td>
										<td colspan="5"><textarea class="form-control" name="solusn"></textarea></td>
										
									</tr>
									<tr>
										<td colspan="5"></td>
										<td><input type="submit" name="submet" class="btn btn-danger" value="Submit"></td>
										
									</tr>
								</table>
								</form>
								<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
include('footer.php');
?>