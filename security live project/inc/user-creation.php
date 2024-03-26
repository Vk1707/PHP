<?php
include('header.php');
?>
<?php
if(isset($_POST['getpass']))
{
	$building = $_POST['building'];
	$emailad = strtolower($_POST['emailad']);
	$empname = $_POST['empname'];
	$empid = strtoupper($_POST['empid']);
	$depart = $_POST['depart'];
	$manager = $_POST['manager'];
	

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

		$csql = "INSERT INTO `sc_users`(`sc_name`, `sc_emapid`, `sc_email`, `sc_pass`,`sc_post`, `sc_process`, `sc_manager`, `sc_building`, `sc_status`, `sc_uploadby`, `sc_uploadon`) VALUES ('$empname','$empid','$emailad','google@123','User','$depart','$manager','$building','1','$ademail','$daytime')";
		$cres = mysqli_query($conn,$csql);
		if($cres == true)
		{
			header('Location:user-creation.php');
		}
	
		
	



}

?>
<?php
if(isset($_GET['del']))
{
	$del = $_GET['del'];

	$sql = "UPDATE `sc_users` SET `sc_status`='0' WHERE `sc_emapid`='$del'";
	$res = mysqli_query($conn,$sql);
	if($res == true)
	{
		header('Location:user-creation.php');
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
				<div class="col-lg-3 col-md-3">
					<div class="dis-menu">
						<button class="btndanger btn-block" id="addform"> <i class="fa fa-user-plus"> </i> Create User</button>
						<ul class="dis-file-menu">
							<?php
								$sql = "SELECT * FROM `sc_users` WHERE `sc_status`='1' AND `sc_uploadby`='$ademail'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<li><a href="?ids=<?php echo $row['sc_emapid'];?>"><i class="fa fa-angle-double-right"></i> <?php echo $row['sc_name'];?> <small>(<?php echo $row['sc_emapid'];?>)</small></a></li>
									<?php
								}
							?>
							
						</ul>
					</div>
				</div>

				<div class="col-lg-9 col-md-9">

					<div class="dis-file-view">

						
							<?php
								if(isset($_GET['ids']))
								{
									$ids = $_GET['ids'];
									$sql = "SELECT * FROM `sc_users` WHERE sc_emapid='$ids'";
									$res = mysqli_query($conn,$sql);
									$row = mysqli_fetch_array($res);
									echo "
										<table class='table text-secondary table-bordered'>
										
										<tr>
											<td colspan='2' class='text-center'> Employee Details<br>
											<small>Silaris Informations Pvt Ltd</small>
											</td>
										</tr>
										
										<tr>
											<td>Building Number</td><td>".$row['sc_building']."</td>

										</tr>
										<tr>
											<td>Name of Employee</td><td>".$row['sc_name']."</td>
											
										</tr>
										<tr>
											<td>Employee ID</td><td>".$row['sc_emapid']."</td>
											
										</tr>
										<tr>
											<td>Email Address</td><td>".$row['sc_email']."</td>
											
										</tr>
										<tr>
											<td>Process / Department</td><td>".$row['sc_process']."</td>
											
										</tr>
										<tr>
											<td>Name of Manager</td><td>".$row['sc_manager']."</td>
											
										</tr>
										
										
										</table>
										<br>
										<table class='table text-secondary table-bordered'>
										<tr>
											<td>Created By</td><td>".$row['sc_uploadby']."</td>
											
										</tr>
										<tr>
											<td>Date : Time</td><td>".$row['sc_uploadon']."</td>
											
										</tr>
										</table>
										<br>
										<br>
										<a href='?del=$ids' title='".$ids."' class='btn btn-danger float-right'>Delete</a>
										
										

									";

								}

								else
								{
									echo "<span class='text-secondary'>Data Table</span>";
								}
							?>
							
						
					</div>
				</div>
			</div>
			
		</div>
	
<div class="internal-form" id="internal">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
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
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Email Address</label>
				<input type="email" name="emailad" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Building Number :</label>
				<select class="form-control" name="building" required>
					<option value="" disabled="" selected="">Select Building</option>
					<option value="14A">14/1</option>
					<option value="14B">14/2</option>
					<option value="14C">14/3</option>
					<option value="A6">A-6</option>
					<option value="A7">A-7</option>
					<option value="A1">A-1</option>
				</select>
				</div>

				
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