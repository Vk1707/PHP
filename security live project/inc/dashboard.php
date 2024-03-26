<?php
include('header.php');
?>
<?php

if(isset($_POST['procret']))
{
	$proname = strtoupper($_POST['proname']);
	$proname = str_replace(' ','-',$proname);
	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	$tsql = "SELECT * FROM `sc_process` WHERE `sc_process`='$proname'";
	$tres = mysqli_query($conn,$tsql);
	$trow = mysqli_fetch_array($tres);
	if($trow == true)
	{
		echo "<script>alert('Process Already Exist!')</script>";
	}
	else
	{
		$sql = "INSERT INTO `sc_process`(`sc_process`, `sc_createdon`) VALUES ('$proname','$daytime')";
		$res = mysqli_query($conn,$sql);
		if($res == true)
		{
			header('Location:dashboard.php');
		}
	}


	
}

?>
<?php

if(isset($_POST['sprocret']))
{
	$sbproname = strtoupper($_POST['sbproname']);
	$sbproname = str_replace(' ','-',$sbproname);
	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	$tsql = "SELECT * FROM `sc_sbprocess` WHERE `sc_sbprocess`='$sbproname'";
	$tres = mysqli_query($conn,$tsql);
	$trow = mysqli_fetch_array($tres);
	if($trow == true)
	{
		echo "<script>alert('Sub Process Already Exist!')</script>";
	}
	else
	{
		$sql = "INSERT INTO `sc_sbprocess`(`sc_sbprocess`, `sc_createdon`) VALUES ('$sbproname','$daytime')";
		$res = mysqli_query($conn,$sql);
		if($res == true)
		{
			header('Location:dashboard.php');
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
				<div class="col-lg-6 col-md-6"></div>
				
				<div class="col-lg-6 col-md-6">
					
						<button class="btndanger float-right" id="addform"> <i class="fa fa-beer"> </i> Process Creation</button>
						<button class="btndanger float-right mr-3" id="addform2"> <i class="fa fa-beer"> </i> Sub Process Creation</button>
					
				</div>
				
			</div>	
			<div class="row">
				<div class="col-lg-3">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-envelope"></i>
							</div>
							<div class="dis-right float-right">
								<a href="email-request.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Email Request <!-- <span class="badge badge-danger dis-blink">5</span> --></p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-binoculars"></i>
							</div>
							<div class="dis-right float-right">
								<a href="isms-policies.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>ISMS Policies </p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-address-card"></i>
							</div>
							<div class="dis-right float-right">
								<a href="get-pass-list.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Gate Pass </p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-user-plus"></i>
							</div>
							<div class="dis-right float-right">
								<a href="user-creation.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>User Creation</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-database"></i>
							</div>
							<div class="dis-right float-right">
								<a href="inventory.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>IT Inventroy</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-globe"></i>
							</div>
							<div class="dis-right float-right">
								<a href="incident-manage.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Incident Management</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-newspaper-o"></i>
							</div>
							<div class="dis-right float-right">
								<a href="incident-report.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Incident Report</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-object-ungroup"></i>
							</div>
							<div class="dis-right float-right">
								<a href="ccrm.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>CCRF</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-wifi"></i>
							</div>
							<div class="dis-right float-right">
								<a href="wifi-access.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Wifi Access</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				
				
				
			</div>
		</div>
	</div>
<div class="internal-form" id="internal">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group">
				
					<label>Process Name</label>
				<input type="text" name="proname" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="submit" name="procret" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<div class="internal-form" id="internal">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group">
				
					<label>Process Name</label>
				<input type="text" name="proname" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="submit" name="procret" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<div class="internal-form" id="internal2">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group">
				
					<label>Sub-Process Name</label>
				<input type="text" name="sbproname" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="submit" name="sprocret" class="btn btn-dark" value="Submit">
				<button id="closeform2" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<?php
include('footer.php');
?>