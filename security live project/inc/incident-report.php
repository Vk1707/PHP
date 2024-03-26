<?php
include('header.php');
?>
<?php

if(isset($_POST['inclisub']))
{
	$issueby = $_POST['issueby'];
	$incdetal = $_POST['incdetal'];
	$investidtal = $_POST['investidtal'];
	$rca = $_POST['rca'];
	$actaken = $_POST['actaken'];
	$investiby = $_POST['investiby'];
	$approby = $_POST['approby'];
	$priorit = $_POST['priorit'];
	$category = $_POST['category'];
	$incistart = $_POST['incistart'];
	$inciclose = $_POST['inciclose'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');
	$yr = date('Y');
	$mr = date('m');

	$ewel = "SELECT * FROM `sc_incireport`";
	$cst = mysqli_query($conn,$ewel);
	$trow = mysqli_fetch_array($cst);
	$tnu = $trow['sc_sno'];
	$tnum = $tnu++;
	$tickid = "INC".$yr.$mr.$tnum;
	
	$csql = "INSERT INTO `sc_incireport`(`sc_ticketno`, `sc_issueby`, `sc_incidetail`, `sc_investidetail`, `sc_rca`, `sc_actionteken`, `sc_invenstiby`, `sc_approvedby`, `sc_priority`, `sc_category`, `sc_startdate`, `sc_closetime`, `sc_createby`, `sc_createon`, `sc_status`) VALUES ('$tickid','$issueby','$incdetal','$investidtal','$rca','$actaken','$investiby','$approby','$priorit','$category','$incistart','$inciclose','$adname','$daytime','1')";
			$cres = mysqli_query($conn,$csql);
			if($cres == true)
			{
				header('Location:incident-report.php');
			}
	
}
?>
	
	<?php
		if(isset($_GET['tid']))
		{
			$tid = $_GET['tid'];
			$chst = "UPDATE `sc_incireport` SET `sc_status`='2' WHERE `sc_sno`='$tid'";
			$chres = mysqli_query($conn,$chst);
			if($chres == true)
			{
				header('Location:incident-report.php');
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
				<div class="col-lg-6 col-md-6">
					<form class="form-inline" method="GET">
						<input type="number" name="tickeid" class="form-control" required placeholder="Search by Ticket ID...">
						<input type="submit" value="Find" class="btn btn-danger ml-2">
					</form>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="clearfix">
						
						<button class="btn btn-info float-right" id="addform"> <i class="fa fa-edit"></i> Create Report</button>
					</div>
				</div>
									
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Ticket ID</td>
						<td>Incident_Start_Date_Time</td>
						<td>Incident_Closure_Date_Time</td>
						<td>Issue Reported By</td>
						<td>Incident Details</td>
						<td>Investigation Details</td>
						<td>RCA</td>
						<td>Action Taken</td>
						<td>Incident Investigate By</td>
						<td>Incident Approved By</td>
						<td>Action</td>
						<td>Download</td>
					</thead>
					<tbody>
						<?php
							if(isset($_GET['tickeid']))
							{
								$tnum = 1;
								$tickeid = $_GET['tickeid'];
								$ttsql = "SELECT * FROM `sc_incireport` WHERE sc_ticketno LIKE '%$tickeid%' ORDER BY sc_sno DESC";
								$ttres = mysqli_query($conn,$ttsql);
								while($ttrow = mysqli_fetch_array($ttres))
								{
									?>
									<tr>
										<td><?php echo $tnum;?></td>
										<td><?php echo $ttrow['sc_ticketno'];?></td>
										<td><?php echo $ttrow['sc_startdate'];?></td>
										<td><?php echo $ttrow['sc_closetime'];?></td>
										<td><?php echo $ttrow['sc_issueby'];?></td>
										<td><?php echo $ttrow['sc_incidetail'];?></td>
										<td><?php echo $ttrow['sc_investidetail'];?></td>
										<td><?php echo $ttrow['sc_rca'];?></td>
										<td><?php echo $ttrow['sc_actionteken'];?></td>
										<td><?php echo $ttrow['sc_invenstiby'];?></td>
										<td><?php echo $ttrow['sc_approvedby'];?></td>
										
										<td><a href="incident-report.php?tid=<?php echo $ttrow['sc_sno'];?>" class='netwlt'> Delete</a></td>
										<td><a href="incident-download.php?tid=<?php echo $ttrow['sc_ticketno'];?>"><i class="fa fa-download"></i></a></td>
									</tr>
									<?php
									$tnum++;
									}
								}
								else
								{
									$tnum = 1;
									$ttsql = "SELECT * FROM `sc_incireport` WHERE sc_status='1' ORDER BY sc_sno DESC";
								$ttres = mysqli_query($conn,$ttsql);
								while($ttrow = mysqli_fetch_array($ttres))
								{
									?>
									<tr>
										<td><?php echo $tnum;?></td>
										<td><?php echo $ttrow['sc_ticketno'];?></td>
										<td><?php echo $ttrow['sc_startdate'];?></td>
										<td><?php echo $ttrow['sc_closetime'];?></td>
										<td><?php echo $ttrow['sc_issueby'];?></td>
										<td><?php echo $ttrow['sc_incidetail'];?></td>
										<td><?php echo $ttrow['sc_investidetail'];?></td>
										<td><?php echo $ttrow['sc_rca'];?></td>
										<td><?php echo $ttrow['sc_actionteken'];?></td>
										<td><?php echo $ttrow['sc_invenstiby'];?></td>
										<td><?php echo $ttrow['sc_approvedby'];?></td>
										
										<td><a href="incident-report.php?tid=<?php echo $ttrow['sc_sno'];?>" class='netwlt'> Delete</a></td>
										<td><a href="incident-download.php?tid=<?php echo $ttrow['sc_ticketno'];?>"><i class="fa fa-download"></i></a></td>
									</tr>
									<?php
									$tnum++;
								}

							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<div class="internal-form" id="internal">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Issue Reported By</label>
				<input type="text" name="issueby" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Incident Details</label>
				<input type="text" name="incdetal" class="form-control" required>
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Investigation Details</label>
				<input type="text" name="investidtal" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>RCA</label>
					<input type="text" name="rca" class="form-control" required>
				
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>Action Taken</label>
				<input type="text" name="actaken" class="form-control" required>
				</div>
				
				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Incident Investigate By</label>
				<input type="text" name="investiby" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Incident Approved By</label>
					<input type="text" name="approby" class="form-control" required>
				
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-3 col-md-3">
					<label>Incident Priority</label>
				<input type="text" name="priorit" class="form-control" required>
				</div>
				<div class="col-lg-3 col-md-3">
					<label>Incident Category</label>
					<input type="text" name="category" class="form-control" required>
				
				</div>
				<div class="col-lg-3 col-md-3">
					<label>Incident Start Date & Time</label>
					<input type="datetime-local" name="incistart" class="form-control" required>
				
				</div>
				<div class="col-lg-3 col-md-3">
					<label>Incident Closure Date & time</label>
					<input type="datetime-local" name="inciclose" class="form-control" required>
				
				</div>
				
			</div>
			
			
			<div class="form-group">
				<input type="submit" name="inclisub" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<?php
include('footer.php');
?>