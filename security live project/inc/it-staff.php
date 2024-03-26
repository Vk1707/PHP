<?php
include('header.php');
?>
<?php
if(isset($_POST['filesub']))
{
	$loc = $_POST['loc'];
	$person = $_POST['person'];
	$designation = $_POST['designation'];
	$contact = $_POST['contact'];
	$pemail = $_POST['pemail'];
	$ftime = $_POST['ftime'];
	$ttime = $_POST['ttime'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');

	$usql = "INSERT INTO `sc_itstaff`(`sc_location`, `sc_person`, `sc_designation`, `sc_contact`, `sc_pemail`, `sc_department`, `sc_ftime`, `sc_ltime`, `sc_status`, `sc_uploadon`, `sc_uploadby`) VALUES ('$loc','$person','$designation','$contact','$pemail','IT','$ftime','$ttime','1','$uploadon','$adname')";
	$ures = mysqli_query($conn,$usql);
	if($ures == true)
	{
		header('Location:it-staff.php');
	}

}

?>
	<?php
		if(isset($_GET['ids']))
		{
			$ids = $_GET['ids'];
			$dsql = "UPDATE `sc_itstaff` SET sc_status='0' WHERE `sc_sno`='$ids'";
			$dres = mysqli_query($conn,$dsql);
			if($dres == true)
			{
				header('Location:it-staff.php');
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
			<div class="row py-3">
				<div class="col-lg-6 col-md-6"></div>
				<div class="col-lg-6 col-md-6">
					<button class="btndanger float-right" id="addform"> <i class="fa fa-upload"> </i> Upload File</button>
				</div>

			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th>S.No</th>
						<th>Location</th>
						<th>Contact Person</th>
						<th>Designation</th>
						<th>Contact</th>
						<th>Email Address</th>
						<th>Department</th>
						<th>Shift Timing</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							$num =1;
							$sql = "SELECT * FROM `sc_itstaff` WHERE sc_status='1'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sc_location'];?></td>
								<td><?php echo $row['sc_person'];?></td>
								<td><?php echo $row['sc_designation'];?></td>
								<td><?php echo $row['sc_contact'];?></td>
								<td><?php echo $row['sc_pemail'];?></td>
								<td><?php echo $row['sc_department'];?></td>
								<td><?php echo $row['sc_ftime'];?>-<?php echo $row['sc_ltime'];?></td>
								<td><a href="it-staff.php?ids=<?php echo $row['sc_sno'];?>" class="">Delete</a></td>
							</tr>
								<?php
								$num++;
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="internal-form" id="internal">
	<div class="infernaldis">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Location :</label>
				<input type="text" name="loc" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Contact Person :</label>
				<input type="text" name="person" class="form-control" required>
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Designation :</label>
				<input type="text" name="designation" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Contact :</label>
				<input type="text" name="contact" class="form-control" required>
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Email Address :</label>
				<input type="email" name="pemail" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Shift Timing :</label>
					<br>
				From : <input type="time" name="ftime" class="mr-4" required>  To :<input type="time" name="ttime" class="" required>
				</div>
				
			</div>
			<div class="form-group">
				<input type="submit" name="filesub" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>