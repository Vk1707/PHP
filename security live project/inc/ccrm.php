<?php
include('header.php');
?>
<?php
if(isset($_GET['tid']))
{
	$tid = $_GET['tid'];
	$cst = "UPDATE `sc_ccrmdata` SET sc_status='0' WHERE sc_sno='$tid'";
	$rst = mysqli_query($conn,$cst);
	if($rst == true)
	{
		header('Location:ccrm.php');
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
					
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="clearfix">
						
						<a href="create-ccrm.php" class="btn btn-info float-right"> <i class="fa fa-edit"></i> Create CCRM</a>
					</div>
				</div>
									
			</div>
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>CCR Number</td>
						<td>Change_Control_Date_Time</td>
						<td>Type of Change</td>
						<td>Location</td>
						<td>Description</td>
						<td>Nature of Change</td>
						<td>Start_Date_and_Time</td>
						<td>Expected_Date_and_Time</td>
						<td>Priority</td>
						<td>ISMS Impact</td>
						<td>Possible Impact</td>
						<td>Approved By</td>
						<td>Purpose for change</td>
						<td>Process Owner</td>
						<td>Owner</td>
						<td>Pinaki Narendra</td>
						<td>Samarth Jain</td>
						<td>Rajesh Bisht</td>
						<td>Tanay Dobhal</td>
						<td>Edit</td>
						<td>Action</td>
						<td>Download</td>
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_ccrmdata` WHERE sc_status='1' ORDER BY sc_sno DESC";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['sc_ccrmno'];?></td>
									<td><?php echo $trow['sc_ccrmdate'];?></td>
									<td><?php echo $trow['sc_typeofchange'];?></td>
									<td><?php echo $trow['sc_location'];?></td>
									<td><?php echo $trow['sc_description'];?></td>
									<td><?php echo $trow['sc_natureofchange'];?></td>
									<td><?php echo $trow['sc_startdate'];?></td>
									<td><?php echo $trow['sc_expectedate'];?></td>
									<td><?php echo $trow['sc_priority'];?></td>
									<td><?php echo $trow['sc_ismsimpact'];?></td>
									<td><?php echo $trow['sc_possibleimpact'];?></td>
									<td><?php echo $trow['sc_ismsapprove'];?></td>
									<td><?php echo $trow['sc_purposeofchange'];?></td>
									<td><?php echo $trow['sc_porocessowner'];?></td>
									<td><?php echo $trow['sc_owner'];?></td>
									<td><?php
									if($trow['sc_informed_a'] != "")
									{
										$hrid = $trow['sc_a_action']; 
										if($hrid == "0")
										{
											echo "<img src='../assets/img/red.png'>";
										}
										else
										{
											echo "<img src='../assets/img/green.png'>";
										}
									}
									else
									{
										echo "";
									}
									
									
									?></td>
									<td><?php
									if($trow['sc_informed_b'] != "")
									{
										$proav = $trow['sc_b_action']; 
										if($proav == "0")
										{
											echo "<img src='../assets/img/red.png'>";
										}
										else
										{
											echo "<img src='../assets/img/green.png'>";
										}
									}
									else
									{
										echo "";
									}
									
									?></td>
									
									
									<td><?php
									if($trow['sc_informed_c'] != "")
									{
										$act = $trow['sc_c_action']; 
										if($act == "0")
										{
											echo "<img src='../assets/img/red.png'>";
										}
										else
										{
											echo "<img src='../assets/img/green.png'>";
										}
									}
									else
									{
										echo "";
									}
									
									?></td>
									<td><?php
									if($trow['sc_informed_d'] != "")
									{

										$act = $trow['sc_d_action']; 
										if($act == "0")
										{
											echo "<img src='../assets/img/red.png'>";
										}
										else
										{
											echo "<img src='../assets/img/green.png'>";
										}
									}
									else
									{
										echo "";
									}
									
									?></td>
									<td><a href="ccrm-edit.php?tid=<?php echo $trow['sc_sno'];?>" class='netwlt'>Edit</a></td>
									<td><a href="?tid=<?php echo $trow['sc_sno'];?>" class='blred'>Delete</a></td>
									<td><a href="ccrm-download.php?tid=<?php echo $trow['sc_sno'];?>"><i class="fa fa-download"></i></a></td>
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

<?php
include('footer.php');
?>