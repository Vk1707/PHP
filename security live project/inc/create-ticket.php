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
			header('Location:create-ticket.php');
		}
	}


	
}

?>
<?php

if(isset($_POST['maincret']))
{
	$maininci = strtoupper($_POST['maininci']);
	$maininci = str_replace(' ','-',$maininci);
	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	

	$tsql = "SELECT * FROM `sc_incidentcat` WHERE `sc_mainincident`='$maininci'";
	$tres = mysqli_query($conn,$tsql);
	$trow = mysqli_fetch_array($tres);
	if($trow == true)
	{
		echo "<script>alert('Main Incident Already Exist!')</script>";
	}
	else
	{
		$sql = "INSERT INTO `sc_incidentcat`(`sc_mainincident`, `sc_createdon`, `sc_createdby`, `sc_status`) VALUES ('$maininci','$daytime','$adname','1')";
		$res = mysqli_query($conn,$sql);
		if($res == true)
		{
			header('Location:create-ticket.php');
		}
	}


	
}

?>
<?php

if(isset($_POST['subincicret']))
{
	$subinci = strtoupper($_POST['subinci']);
	$subinci = str_replace(' ','-',$subinci);
	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	

	$tsql = "SELECT * FROM `sc_incidentcat` WHERE `sc_subincident`='$subinci'";
	$tres = mysqli_query($conn,$tsql);
	$trow = mysqli_fetch_array($tres);
	if($trow == true)
	{
		echo "<script>alert('Sub Incident Already Exist!')</script>";
	}
	else
	{
		$sql = "INSERT INTO `sc_incidentcat`(`sc_subincident`, `sc_createdon`, `sc_createdby`, `sc_status`) VALUES ('$subinci','$daytime','$adname','1')";
		$res = mysqli_query($conn,$sql);
		if($res == true)
		{
			header('Location:create-ticket.php');
		}
	}


	
}

?>

<?php

if(isset($_POST['errorsub']))
{
	$emprocess = $_POST['emprocess'];
	$mainincident = $_POST['mainincident'];
	$subincident = $_POST['subincident'];
	$comment = htmlspecialchars($_POST['comment']);

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	$task = "SELECT * FROM `sc_security` ORDER BY sc_sno DESC LIMIT 1";
	$tsres = mysqli_query($conn,$task);
	$tsnum = mysqli_num_rows($tsres);
	$tsrow = mysqli_fetch_array($tsres);
	$tnum = @$tsrow['sc_sno'];
	$ttnum = $tnum+1;
	$ticketid = "SEC2022".$ttnum;

	try
	{
		if($tsnum < 0)
	{
		$csql = "INSERT INTO `sc_security`(`sc_ticketid`, `sc_name`, `sc_emailid`, `sc_emprocss`, `sc_mainpage`, `sc_subpage`, `sc_details`, `sc_status`, `sc_createdon`, `sc_createdby`) VALUES ('SEC20220','$adname','$ademail','$emprocess','$mainincident','$subincident','$comment','1','$daytime','$ademail')";
		$cres = mysqli_query($conn,$csql);
		if($cres == true)
		{
			header('Location:create-ticket.php');
			mysqli_close();
			exit();
		}
	}
	else
	{
		$csql = "INSERT INTO `sc_security`(`sc_ticketid`, `sc_name`, `sc_emailid`, `sc_emprocss`, `sc_mainpage`, `sc_subpage`, `sc_details`, `sc_status`, `sc_createdon`, `sc_createdby`) VALUES ('$ticketid','$adname','$ademail','$emprocess','$mainincident','$subincident','$comment','1','$daytime','$ademail')";
		$cres = mysqli_query($conn,$csql);
		if($cres == true)
		{
			header('Location:create-ticket.php');
			mysqli_close();
			exit();
		}
	}

	}
	catch(mysqli_sql_exception $e)
	{
		var_dump($e);
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
			<div class="row mb-4">
				<div class="col-lg-3 col-md-3">
					<button class="btndanger" id="addform1"> <i class="fa fa-beer"> </i> Create Main Incident</button>
				</div>
				<div class="col-lg-3 col-md-3">
					<button class="btndanger" id="addform2"> <i class="fa fa-beer"> </i> Create Sub Incident</button>
				</div>

				
				<div class="col-lg-6 col-md-6">
					
						<button class="btndanger float-right" id="addform"> <i class="fa fa-beer"> </i> Process Creation</button>
						
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="incident-form">
						<h3 class="text-center">Ticket Form</h3>
						<form class="" method="POST" action="">
							<div class="form-group">
								<label>Process Name</label>
								<select class="form-control" name="emprocess">
									<option value="" disabled="" selected="">Select Process</option>
									<?php
										$usql = "SELECT * FROM `sc_process`";
										$ures = mysqli_query($conn,$usql);
										while($urow = mysqli_fetch_array($ures))
										{
											?>
											<option value="<?php echo $urow['sc_process'];?>"><?php echo $urow['sc_process'];?></option>
											<?php
										}
									?>
								</select>
								</div>
								<div class="form-group">
								<label>Main Incident</label>
								<select class="form-control" name="mainincident">
									
									<option value="" disabled="" selected="">Select Incident</option>
									<?php
										$usql = "SELECT * FROM `sc_incidentcat`";
										$ures = mysqli_query($conn,$usql);
										while($urow = mysqli_fetch_array($ures))
										{
											if($urow['sc_mainincident'] != "")
											{
											?>
											<option value="<?php echo $urow['sc_mainincident'];?>"><?php echo $urow['sc_mainincident'];?></option>
											<?php
										}
										}
									?>
									
								</select>
								</div>
								<div class="form-group">
								<label>Sub Incident</label>
								<select class="form-control" name="subincident">
									
									<option value="" disabled="" selected="">Select Incident</option>
									<?php
										$usql = "SELECT * FROM `sc_incidentcat`";
										$ures = mysqli_query($conn,$usql);
										while($urow = mysqli_fetch_array($ures))
										{
											if($urow['sc_subincident'] != "")
											{
											?>
											<option value="<?php echo $urow['sc_subincident'];?>"><?php echo $urow['sc_subincident'];?></option>
											<?php
										}
										}
									?>
								</select>
								</div>
								<div class="form-group">
									<label>Issue in Details :</label>
									<textarea class="form-control" name="comment"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" name="errorsub" class="btn btn-danger" value="Send">
								</div>
								
							
						</form>
					</div>
				</div>
				<div class="col-lg-8 col-md-8">
					<?php
						$til = "SELECT * FROM `sc_security` WHERE sc_createdby='$ademail' ORDER BY sc_sno DESC LIMIT 1";
						$tre = mysqli_query($conn,$til);
						while($tro = mysqli_fetch_array($tre))
						{
							?>
							<div class="ticket-view">
								<table class="table table-bordered">
									<tr>
										<td colspan="6" class="text-center table-secondary">Last Ticket Details</td>
									</tr>
									<tr>
										<td class="table-secondary">Ticket Number</td>
										<td><?php echo $tro['sc_ticketid'];?></td>
										<td class="table-secondary">Your Name</td>
										<td><?php echo $tro['sc_name'];?></td>
										<td class="table-secondary">Process</td>
										<td><?php echo $tro['sc_emprocss'];?></td>
									</tr>
									<tr>
										<td class="table-secondary">Main Incident</td>
										<td><?php echo $tro['sc_mainpage'];?></td>
										<td class="table-secondary">Sub Incident</td>
										<td><?php echo $tro['sc_subpage'];?></td>
										<td class="table-secondary">Data || Time</td>
										<td><?php echo $tro['sc_createdon'];?></td>
									</tr>
									<tr>
										<td class="table-secondary">Details</td>
										<td colspan="5">
											<?php echo $tro['sc_details'];?>
										</td>
									</tr>
									<tr>
										<td colspan="6" class="text-center table-secondary">Silaris Informations Pvt ltd</td>
									</tr>

								</table>
							</div>
							<?php
						}
					?>
					
				</div>

			</div>
			
		</div>
	</div>
<div class="internal-form" id="internal">
	<div class="infernal-disp">
		<h3 class="text-center">Process Creation Form</h3>
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group">
				
					<label>Process Name</label>
				<input type="text" name="proname" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="submit" name="procret" class="btn btn-dark" value="Submit">
				<span id="closeform" class="btn btn-danger ml-2">Close</span>
			</div>
		</form>
	</div>
</div>
<div class="internal-form" id="internal1">
	<div class="infernal-disp">
		<h3 class="text-center">Main Incident Creation Form</h3>
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group">
				
					<label>Main Incident Name</label>
				<input type="text" name="maininci" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="submit" name="maincret" class="btn btn-dark" value="Submit">
				<span id="closeform1" class="btn btn-danger ml-2">Close</span>
			</div>
		</form>
	</div>
</div>
<div class="internal-form" id="internal2">
	<div class="infernal-disp">
		<h3 class="text-center">Sub Incident Creation Form</h3>
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group">
				
					<label>Sub Incident Name</label>
				<input type="text" name="subinci" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="submit" name="subincicret" class="btn btn-dark" value="Submit">
				<span id="closeform2" class="btn btn-danger ml-2">Close</span>
			</div>
		</form>
	</div>
</div>
<?php
include('footer.php');
?>