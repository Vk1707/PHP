<?php
include('header.php');
include_once("emailconfig.php");
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
			<div class="row mb-4">
				<div class="col-lg-6 col-md-6">
					<a href="wifi-history.php" class="btn btn-warning"><i class="fa fa-history"></i> History</a>
				</div>
				<div class="col-lg-6 col-md-6">
					
				</div>
									
			</div>
			
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
						<td>IT Dept.</td>
						<td>Action</td>
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_wifiaccess` WHERE sc_status='1' AND sc_wifinetwork='0' AND sc_wifiactive='0'  ORDER BY sc_sno DESC";
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
										if($hrid == "0")
										{
											echo "<img src='../assets/img/red.png'>";
										}
										else
										{
											echo "<img src='../assets/img/green.png'>";
										}
									
									
									
									?></td>
									<td><a href="wifi-approve.php?wid=<?php echo $trow['sc_sno'];?>" class="aprv">Approve</a></td>
									
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

<?php
include('footer.php');
?>