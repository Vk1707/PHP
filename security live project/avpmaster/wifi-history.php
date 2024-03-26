<?php
include('header.php');
include_once("../emailconfig.php");
?>
<?php
if(isset($_GET['tid']))
{
	$tid = $_GET['tid'];
	$cst = "UPDATE `sc_wifiaccess` SET sc_status='0' WHERE sc_sno='$tid'";
	$rst = mysqli_query($conn,$cst);
	if($rst == true)
	{
		header('Location:wifi-access.php');
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
			
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Wifi_Access_ID</td>
						<td>Created BY</td>
						<td>Created_On</td>
						<td>Name</td>
						<td>Designation</td>
						<td>Process / Dept.</td>
						<td>User For</td>
						<td>Employee ID <small><em>(Optional)<em></small></td>
						<td>User Assets Type</td>
						<td>MAC Address</td>
						<td>Date</td>
						<td>Time Period</td>
						<td>ISMS Dept.</td>
						
						<td>Network</td>
						<td>Status</td>
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_wifiaccess` WHERE sc_status='1' AND sc_createremail='$ademail' ORDER BY sc_sno DESC";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['sc_wifiaccessid'];?></td>
									<td><?php echo $trow['sc_createdby'];?></td>
									<td><?php echo $trow['sc_createdon'];?></td>
									<td><?php echo $trow['sc_wifiname'];?></td>
									<td><?php echo $trow['sc_wifidesinations'];?></td>
									<td><?php echo $trow['sc_wifiprocess'];?></td>
									<td><?php echo $trow['sc_wifiguest'];?></td>
									<td><?php echo $trow['sc_wifiempid'];?></td>
									<td><?php echo $trow['sc_wifiassets'];?></td>
									<td><?php echo $trow['sc_wifisystem'];?></td>
									<td><?php echo $trow['sc_wifidate'];?></td>
									<td><?php echo $trow['sc_wifiperiod'];?></td>
									
									<td><?php
									$hrid = $trow['sc_wifisms'];
									switch($hrid)
									{
										case "0":
										echo "<img src='../assets/img/red.png' title='Not Action'>";
										break;
										case "1":
										echo "<img src='../assets/img/green.png' title='Approved'>";
										break;
										case "2":
										echo "<img src='../assets/img/blue.png' title='Rejected'>";
										break;
									} 
										
									
									
									
									?></td>
									
									<td><?php
									$act = $trow['sc_wifinetwork']; 
										switch($act)
									{
										case "0":
										echo "<img src='../assets/img/red.png' title='Not Action'>";
										break;
										case "1":
										echo "<img src='../assets/img/green.png' title='Approved'>";
										break;
										case "2":
										echo "<img src='../assets/img/blue.png' title='Rejected'>";
										break;
									} 
									
									?></td>
									<td><?php
									$act = $trow['sc_wifiactive']; 
										switch($act)
									{
										case "0":
										echo "<img src='../assets/img/orange.png' title='Progress'>";
										break;
										case "1":
										echo "<img src='../assets/img/green.png' title='Approved'>";
										break;
										case "2":
										echo "<img src='../assets/img/blue.png' title='Rejected'>";
										break;
									} 
									
									?></td>
									
									
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
<div class="internal-form" id="internal">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
				<label>Name</label>
				<input type="text" name="empname" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Designation</label>
					<input type="text" name="desig" class="form-control" required>
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Process / Dept.</label>
				<input type="text" name="depart" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Choose one :</label>			
				<ul class="timep">

					<li>Guest <input type="radio" name="foruser" required value="Guest"></li>
					<li>Client <input type="radio" name="foruser" required value="Client"></li>
					<li>Internal Employee <input type="radio" name="foruser" required value="Internal-Employee"></li>
					
				</ul>
				
			
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Employee ID (if internal employee)</label>
				<input type="text" name="intenal" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Desktop/Laptop user :</label>
				<input type="text" name="laptopuser" class="form-control" required>
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>System MAC Address :</label>
				<input type="text" name="systemsmac" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Date:</label>
				<input type="date" name="accessdate" class="form-control" required>
				</div>

				
			</div>
			<div class="form-group">
				<label>Time Period of Internet Access: </label>
				<ul class="timep">
					<li>4 to 8 hr. <input type="radio" name="timehr" required value="4-to-8"></li>
					<li>3 days. <input type="radio" name="timehr" required value="3-days"></li>
					<li>1 week. <input type="radio" name="timehr" required value="1-week"></li>
					<li>1 month. <input type="radio" name="timehr" required value="1-month"></li>
					<li>3 month. <input type="radio" name="timehr" required value="3-month"></li>
				</ul>
				
			</div>
			
			<div class="form-group">
				<input type="submit" name="wifiaccess" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<?php
include('footer.php');
?>