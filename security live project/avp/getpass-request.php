<?php
include('header.php');
?>
<?php
if(isset($_POST['getpass']))
{
	$building = $_POST['building'];
	$willreturn = $_POST['willreturn'];
	$empname = $_POST['empname'];
	$empid = strtoupper($_POST['empid']);
	$depart = $_POST['depart'];
	$manager = $_POST['manager'];
	$reason = $_POST['reason'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	$tsql = "SELECT * FROM `sc_getpass` ORDER BY sc_sno DESC";
	$tres = mysqli_query($conn,$tsql);
	$tnum = mysqli_num_rows($tres);
	$trow = mysqli_fetch_array($tres);
	$tnums = $trow['sc_sno'];
	$tcar = "getpass".$tnum;
	if($tnum > 0)
	{
		$csql = "INSERT INTO `sc_getpass`(`sc_getpassid`,`sc_genratedat`, `sc_empname`, `sc_empid`, `sc_building`, `sc_willreturn`, `sc_process`, `sc_manager`, `sc_getdate`, `sc_gettime`,`sc_description`, `sc_status`, `sc_action`,`sc_generator`,`sc_genetorid`) VALUES ('getpass1','$daytime','$empname','$empid','$building','$willreturn','$depart','$manager','$uploadon','$utime','$reason','1','0','$adname','$ademail')";
		$cres = mysqli_query($conn,$csql);
		if($cres == true)
		{
			header('Location:getpass-request.php');
		}
	}
	else
	{
		$csql = "INSERT INTO `sc_getpass`(`sc_getpassid`,`sc_genratedat`, `sc_empname`, `sc_empid`, `sc_building`, `sc_willreturn`, `sc_process`, `sc_manager`, `sc_getdate`, `sc_gettime`,`sc_description`, `sc_status`, `sc_action`,`sc_generator`,`sc_genetorid`) VALUES ('$tcar','$daytime','$empname','$empid','$building','$willreturn','$depart','$manager','$uploadon','$utime','$reason','1','0','$adname','$ademail')";
		$cres = mysqli_query($conn,$csql);
		if($cres == true)
		{
			header('Location:getpass-request.php');
		}
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
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="dis-menu">
						<button class="btndanger btn-block" id="addform"> <i class="fa fa-address-card"> </i> Create Pass</button>
						<ul class="dis-file-menu">
							<?php
								$sql = "SELECT * FROM `sc_getpass` WHERE sc_status='1' AND sc_genetorid='$ademail'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<li><a href="?ids=<?php echo $row['sc_getpassid'];?>"><i class="fa fa-angle-double-right"></i> <?php echo $row['sc_empname'];?> <small>(<?php echo $row['sc_empid'];?>)</small></a></li>
									<?php
								}
							?>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-9 col-md-9">
					<div class="dis-file-view">
						<table class="table text-secondary table-bordered">
							<?php
								if(isset($_GET['ids']))
								{
									$ids = $_GET['ids'];
									$sql = "SELECT * FROM `sc_getpass` WHERE sc_getpassid='$ids'";
									$res = mysqli_query($conn,$sql);
									$row = mysqli_fetch_array($res);
									echo "
										<tr>
											<td colspan='2' class='text-center'> Gete Pass For Employee<br>
											<small>Timing 9:30 to 18:30</small>
											</td>
										</tr>
										
										<tr>
											<td>Building Number</td><td>".$row['sc_building']."</td>

										</tr>
										<tr>
											<td>Name of Employee</td><td>".$row['sc_empname']."</td>
											
										</tr>
										<tr>
											<td>Employee ID</td><td>".$row['sc_empid']."</td>
											
										</tr>
										<tr>
											<td>Will Employee Return</td><td>".$row['sc_willreturn']."</td>
											
										</tr>
										<tr>
											<td>Process / Department</td><td>".$row['sc_process']."</td>
											
										</tr>
										<tr>
											<td>Name of Manager</td><td>".$row['sc_manager']."</td>
											
										</tr>
										
										<tr>
											<td>Reason For Going Out</td><td>".$row['sc_description']."</td>
											
										</tr>
										</table>
										<br>
										<table class='table text-secondary table-bordered'>
										<tr>
											<td>Approved By</td><td>".$row['sc_building']."</td>
											
										</tr>
										<tr>
											<td>Date</td><td>".$row['sc_building']."</td>
											
										</tr>
										<tr>
											<td>Time</td><td>".$row['sc_building']."</td>
											
										</tr>

									";
								}
								else
								{
									echo "<span class='text-secondary'>Data Table</span>";
								}
							?>
							
						</table>
					</div>
				</div>
			</div>
			
		</div>
	</div>
<div class="internal-form" id="internal">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Building Number :</label>
				<select class="form-control" name="building" required>
					<option value="" disabled="" selected="">Select Building</option>
					<option value="14A">14/1</option>
					<option value="14B">14/2</option>
					<option value="14C">14/2</option>
					<option value="A6">A-6</option>
					<option value="A7">A-7</option>
				</select>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Will Employee Return <small>(yes/no)</small> :</label>
					<select class="form-control" name="willreturn" required>
					<option value="Yes" selected="">Yes</option>
					<option value="No">No</option>
				</select>
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Name of Employee</label>
				<input type="text" name="empname" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Employee ID</label>
				<input type="text" name="empid" class="form-control" required>
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Process / Dept.</label>
				<input type="text" name="depart" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Name of Manager</label>
				<input type="text" name="manager" class="form-control" required>
				</div>
				
			</div>
			<div class="form-group">
				<label>Reason for Going Out</label>
				<textarea class="form-control" name="reason" required></textarea>
				
			</div>
			<div class="form-group">
				<input type="submit" name="getpass" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<?php
include('footer.php');
?>